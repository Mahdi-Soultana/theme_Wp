import $ from "jquery";

wp.customize("_themeName_accent_color", (value) => {
    value.bind((to)=> {
        let inline_css = ``;
        let inline_css_obj = _themename['inline-css'];
        for (let selector in ininline_css_obj) {
            inline_css += `${selector}`;
            for (let prop in inline_css_obj[selector]) {
                let val = inline_css_obj[selector][prop];
                inline_css += `${prop} : ${wp.customize(val).get()}`;
            }
            inline_css += `}`;
        }
        $("#_themeName_StyleSheet-inline-css").html(inline_css);
    })
    console.log(_themeName);
})