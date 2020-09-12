import gulp from 'gulp';
import { argv } from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

const port = browserSync.create();

const PRODUCTION = argv.prod;
const paths = {
    styles: {
        src: ["./asset/src/scss/bundle.scss", "./asset/src/scss/admin.scss"],
        dist: 'dist/asset/src/css'
    },
    images: {
        src: "./asset/src/images/**/*.{jpg,jpeg,png,gif,svg}",
        dist: "./dist/asset/images"
    },
    script: {
        src: ['./asset/src/js/bundle.js', './asset/src/js/admin.js'],
        dist: './dist/asset/js'
    }
    ,

    other: {
        src: ["./asset/src/**/*", "!./asset/src/{images,js,scss}", "!./asset/src/{images,js,scss}/**/*"],
        dist: "./asset/"
    },
    package: {
        src: ["**/*", "!.vscode", "!node_modules{,/**}", "!packaged{,/**}", "!asset{,/**}", "!.babelrc",
            "!gitignore", "!gulpfile.babel.js", "!package.json", "!package-lock.json"],
        dist: "package"
    }
}

export const styles = () => {
    console.log(PRODUCTION);
    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on("error", sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS({ compatibility: "ie8" })))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(paths.styles.dist))
        .pipe(port.stream());

}

export const clean = () => del(["dist"])

export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(gulp.dest(paths.images.dist))

}

export const server = (done) => {
    port.init({
        proxy: "http://first-theme.local/"
    })
    done();
}

export const reload = (done) => {
    port.reload();
    done()
}

export const copy = () => {
    return gulp.src(paths.other.src)
        .pipe(gulp.dest(paths.other.dist));
}

export const scripts = () => {
    return gulp.src(paths.script.src)
        .pipe(named())
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        use: {
                            loader: "babel-loader",
                            options: {
                                presets: ["@babel/env"]
                            }
                        }
                    }
                ]
            },
            output: {
                filename: '[name].js'
            },
            externals: {
                jquery: "jQuery"
            }
            ,
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            mode: PRODUCTION ? 'production' : 'development' //add this
        }))
        .pipe(gulp.dest(paths.script.dist));
}

export const compress = () => {
    return gulp.src(paths.package.src)
        .pipe(replace("_themeName",info.name))
        .pipe(zip(`${info.name}.zip`))
        .pipe(gulp.dest(paths.package.dist));
}

export const watch = () => {
    gulp.watch("./asset/src/scss/**/**.scss", styles);
    gulp.watch("./asset/src/js/**/*.js", gulp.series(scripts, reload));
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch("**/*.php", reload);
    gulp.watch(paths.other.src, gulp.series(copy, reload));
}
export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), server, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
export const bundle = gulp.series(build,compress);

export default dev;
// export default hello;