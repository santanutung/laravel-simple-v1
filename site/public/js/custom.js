// Owl Carousel Start..................



$(document).ready(function () {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function () {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function () {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    two.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

});








// Owl Carousel End..................



//contactSend btn click
$('#contactSend').click(function () {

    let contactNameId = $('#contactNameId').val();
    let contacMobileId = $('#contacMobileId').val();
    let contactEmailId = $('#contactEmailId').val();
    let contactMsgId = $('#contactMsgId').val();

    contactSend(contactNameId, contacMobileId, contactEmailId, contactMsgId)
})


// contactSend medthod

function contactSend(contact_name, contact_mobile, contact_email, contact_msg) {
    if (contact_name == '') {
        $('#contactSend').html('Write your name')
        setTimeout(function () {
            $('#contactSend').html('পাঠিয়ে দিন ')
        }, 2000)
    } else if (contact_mobile == '') {
        $('#contactSend').html('Write  your mobile')
        setTimeout(function () {
            $('#contactSend').html('পাঠিয়ে দিন ')
        }, 2000)
    } else if (contact_email == '') {
        $('#contactSend').html('Write  your email')
        setTimeout(function () {
            $('#contactSend').html('পাঠিয়ে দিন ')
        }, 2000)
    } else if (contact_msg == '') {
        $('#contactSend').html('Write  your massage')
        setTimeout(function () {
            $('#contactSend').html('পাঠিয়ে দিন ')
        }, 2000)
    } else {
        $('#contactSend').html(`sending...`)
        axios.post('/contctSend', {
            'contact_name': contact_name,
            'contact_email': contact_email,
            'contact_mobile': contact_mobile,
            'contact_msg': contact_msg,
        })
            .then(function (response) {
                $('#contactSend').html('পাঠিয়ে দিন ')
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#contactSend').html('Send successfully')

                        setTimeout(function () {
                            $('#contactSend').html('পাঠিয়ে দিন ')
                        }, 4000)

                    } else {
                        $('#contactSend').html('Faild try agiain')
                        setTimeout(function () {
                            $('#contactSend').html('পাঠিয়ে দিন ')
                        }, 4000)

                    }
                } else {
                    $('#contactSend').html('Faild try agiain')
                    setTimeout(function () {
                        $('#contactSend').html('পাঠিয়ে দিন ')
                    }, 4000)

                }

                $('#contactNameId').val('');
                $('#contacMobileId').val('');
                $('#contactEmailId').val('');
                $('#contactMsgId').val('');
            })
            .catch(function (err) {

                $('#contactSend').html('Faild try agiain')
                setTimeout(function () {
                    $('#contactSend').html('পাঠিয়ে দিন ')
                },4000)
                $('#contactNameId').val('');
                $('#contacMobileId').val('');
                $('#contactEmailId').val('');
                $('#contactMsgId').val('');

            })
    }


}
