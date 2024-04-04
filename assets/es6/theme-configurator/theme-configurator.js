/*
function themeConfigurator() {

    $(document).on('change', 'input[name="header-theme"]', ()=>{
        const context = $('input[name="header-theme"]:checked').val();
        console.log(context)
        $(".app").removeClass (function (index, className) {
            return (className.match (/(^|\s)is-\S+/g) || []).join(' ');
        }).addClass( 'is-'+ context );
    });

    $('#side-nav-theme-toogle').on('change', (e)=> {
        $('.app .layout').toggleClass("is-side-nav-dark");
        e.preventDefault();
    });
    
    $('#side-nav-fold-toogle').on('change', (e)=> {
        $('.app .layout').toggleClass("is-folded");
        e.preventDefault();
    });
}

export default { themeConfigurator }
*/
function themeConfigurator() {
    // Load any saved theme settings from localStorage
    if (localStorage.getItem('is-side-nav-dark')) {
        $('.app .layout').addClass("is-side-nav-dark");
        $('#side-nav-theme-toogle').prop('checked', true);
    }

    if (localStorage.getItem('is-folded')) {
        $('.app .layout').addClass("is-folded");
        $('#side-nav-fold-toogle').prop('checked', true);
    }

    $(document).on('change', 'input[name="header-theme"]', ()=> {
        const context = $('input[name="header-theme"]:checked').val();
        console.log(context)
        $(".app").removeClass (function (index, className) {
            return (className.match (/(^|\s)is-\S+/g) || []).join(' ');
        }).addClass( 'is-'+ context );
    });

    $('#side-nav-theme-toogle').on('change', (e)=> {
        $('.app .layout').toggleClass("is-side-nav-dark");
        e.preventDefault();

        // Save the setting to localStorage
        if ($('.app .layout').hasClass("is-side-nav-dark")) {
            localStorage.setItem('is-side-nav-dark', 'true');
        } else {
            localStorage.removeItem('is-side-nav-dark');
        }
    });

    $('#side-nav-fold-toogle').on('change', (e)=> {
        $('.app .layout').toggleClass("is-folded");
        e.preventDefault();

        // Save the setting to localStorage
        if ($('.app .layout').hasClass("is-folded")) {
            localStorage.setItem('is-folded', 'true');
        } else {
            localStorage.removeItem('is-folded');
        }
    });
}

export default { themeConfigurator }