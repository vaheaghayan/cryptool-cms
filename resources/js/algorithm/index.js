let enCheckbox = $('#en-checkbox');
let hyCheckbox = $('#hy-checkbox');


let mainPage = $('#main-page');
let englishPage = $('#english-page').hide();
let armenianPage = $('#armenian-page').hide();

let mainBtn = $('#main-btn');
let englishBtn = $('#english-btn');
let armenianBtn = $('#armenian-btn');


englishPage.hide();
armenianPage.hide();


$('#main-btn').on('click', function (x) {
    $(this).addClass('active');
    englishBtn.removeClass('active')
    armenianBtn.removeClass('active')

    mainPage.show();
    englishPage.hide();
    armenianPage.hide();
})

$('#english-btn').on('click', function (x) {
    $(this).addClass('active');
    mainBtn.removeClass('active')
    armenianBtn.removeClass('active')

    mainPage.hide();
    englishPage.show();
    armenianPage.hide();
})

$('#armenian-btn').on('click', function (x) {
    $(this).addClass('active');
    englishBtn.removeClass('active')
    mainBtn.removeClass('active')

    mainPage.hide();
    englishPage.hide();
    armenianPage.show();
})

// $('#submit-btn').on('click', function () {
//     $.ajax({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         method: 'POST',
//         url: $('#submit-btn').data('url'),
//         dataType: "json",
//
//         contentType: "application/json; charset=utf-8",
//         success: function (data) {
//             console.log(data)
//             // $('#count').html(data.count);
//             // $('.ciphers').hide();
//             // data.ciphers.forEach(function (cipher){
//             //     $(`#${cipher.name}`).show();
//             // });
//         },
//         error: function (data) {
//             console.log(data)
//         }
//
//     });
// });
