const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(
    [
        //company
        "resources/js/app.js",
        "resources/js/company/dashboad/index.js",
        "resources/js/company/project/index.js",
        "resources/js/company/project/create.js",
        "resources/js/company/project/show.js",
        "resources/js/company/task/index.js",
        "resources/js/company/setting/index.js",
        "resources/js/company/document/index.js",

        //partner
        "resources/js/partner/dashboad/index.js"
    ],
    "public/js/app.js"
);

mix.js(
    [
        //PDF
        "resources/js//pdf/logic.js"
    ],
    "public/js/pdf.js"
);

mix.js(
    [
        //change label of task_index
        "resources/js/common/task-status.js"
    ],
    "public/js/common/task-status.js"
);

mix.sass(
    "resources/sass/company/common/index.scss",
    "public/css/company/common"
)
    .sass("resources/sass/auth/login/index.scss", "public/css/auth/login")
    .sass(
        "resources/sass/auth/initialRegister/personal.scss",
        "public/css/auth/initialRegister"
    )
    .sass(
        "resources/sass/auth/initialRegister/company.scss",
        "public/css/auth/initialRegister"
    )
    .sass(
        "resources/sass/auth/initialRegister/preview.scss",
        "public/css/auth/initialRegister"
    )
    .sass(
        "resources/sass/auth/initialRegister/done.scss",
        "public/css/auth/initialRegister"
    )
    .sass(
        "resources/sass/company/dashboard/index.scss",
        "public/css/company/dashboard"
    )
    .sass(
        "resources/sass/company/project/index.scss",
        "public/css/company/project"
    )
    .sass(
        "resources/sass/company/project/create.scss",
        "public/css/company/project"
    )
    .sass(
        "resources/sass/company/project/show.scss",
        "public/css/company/project"
    )
    .sass("resources/sass/company/task/index.scss", "public/css/company/task")
    .sass("resources/sass/company/task/create.scss", "public/css/company/task")
    .sass("resources/sass/company/task/show.scss", "public/css/company/task")
    .sass("resources/sass/company/task/edit.scss", "public/css/company/task")
    .sass(
        "resources/sass/company/partner/index.scss",
        "public/css/company/partner"
    )

    .sass(
        "resources/sass/company/partnerMail/index.scss",
        "public/css/company/partnerMail"
    )
    .sass(
        "resources/sass/company/document/index.scss",
        "public/css/company/document"
    )
    .sass(
        "resources/sass/company/document/purchaseOrder/index.scss",
        "public/css/company/document/purchaseOrder"
    )
    .sass(
        "resources/sass/company/document/invoice/show.scss",
        "public/css/company/document/invoice"
    )
    .sass(
        "resources/sass/company/document/purchaseOrder/show.scss",
        "public/css/company/document/purchaseOrder"
    )
    .sass(
        "resources/sass/company/setting/general/index.scss",
        "public/css/company/setting/general"
    )
    .sass(
        "resources/sass/company/setting/companyElse/index.scss",
        "public/css/company/setting/companyElse"
    )
    .sass(
        "resources/sass/company/setting/account/index.scss",
        "public/css/company/setting/account"
    )
    .sass(
        "resources/sass/company/setting/userSetting/index.scss",
        "public/css/company/setting/userSetting"
    )
    .sass(
        "resources/sass/company/setting/personalInfo/index.scss",
        "public/css/company/setting/personalInfo"
    )
    .sass(
        "resources/sass/company/userMail/index.scss",
        "public/css/company/userMail"
    )
    .sass(
        "resources/sass/company/invite/partner/create.scss",
        "public/css/company/invite/partner"
    )
    .sass(
        "resources/sass/company/invite/company/create.scss",
        "public/css/company/invite/company"
    )
    .sass(
        "resources/sass/company/inviteRegister/reset-password.scss",
        "public/css/company/inviteRegister"
    )

    // partner
    .sass(
        "resources/sass/partner/dashboard/index.scss",
        "public/css/partner/dashboard"
    )
    .sass("resources/sass/partner/task/show.scss", "public/css/partner/task")
    .sass(
        "resources/sass/partner/document/purchaseOrder/index.scss",
        "public/css/partner/document/purchaseOrder"
    )
    .sass(
        "resources/sass/partner/document/invoice/create.scss",
        "public/css/partner/document/invoice"
    )
    .sass(
        "resources/sass/partner/document/invoice/show.scss",
        "public/css/partner/document/invoice"
    )
    .sass(
        "resources/sass/partner/setting/invoice/index.scss",
        "public/css/partner/setting/invoice"
    )
    .sass(
        "resources/sass/partner/profile/index.scss",
        "public/css/partner/profile"
    )

    // pdf
    .sass("resources/sass/pdf/paper.scss", "public/css/pdf");

mix.options({
    publicPath: "public"
});
