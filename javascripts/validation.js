function luhn(num) {
    num = (num + '').replace(/\D+/g, '').split('').reverse();
    if (!num.length) {
        return false;
    }
    var total = 0, i;
    for (i = 0; i < num.length; i++) {
        num[i] = parseInt(num[i])
        total += i % 2 ? 2 * num[i] - (num[i] > 4 ? 9 : 0) : num[i];
    }
    return (total % 10);
}

function validCreditCard(card_number) {
    var firstnumber = parseInt(card_number.substr(0,1));
    switch (firstnumber)
    {
        case 3:
            if (!card_number.match(/^3\d{3}[ \-]?\d{6}[ \-]?\d{5}$/)) {
                return false;
            }
            break;
        case 4:
            if (!card_number.match(/^4\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/)) {
                return false;
            }
            break;
        case 5:
            if (!card_number.match(/^5\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/)) {
                return false;
            }
            break;
        case 6:
            if (!card_number.match(/^6011[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/)) {
                return false;
            }
            break;
        default:
            return false;
    }
    //return luhn(card_number);
}

function changeLabelColor(ele, state) {
    switch (state) {
        case 'error' :
            ele.previous('label').addClassName('labelerror');
            ele.previous('label').removeClassName('labelvalid');
            break;
        case 'valid' :
            ele.previous('label').addClassName('labelvalid');
            ele.previous('label').removeClassName('labelerror');
            break;
        case 'clear' :
            ele.previous('label').removeClassName('labelvalid');
            ele.previous('label').removeClassName('labelerror');
    }
}

document.observe('dom:loaded', function() {
    $('credit_card').observe('change', function() {
        if (!validCreditCard($F('credit_card').strip()) && $F('credit_card').strip().length != 0) {
            changeLabelColor($('credit_card'), 'error');
        }
        else if (validCreditCard($F('credit_card').strip())) {
            changeLabelColor($('credit_card'), 'valid');
        }
        else if ($F('credit_card').strip().length == 0) {
            changeLabelColor($('credit_card'), 'clear');
        }
    });
    ['expiration_month','expiration_year'].each(function(f) {
        $(f).observe('change', function() {
            if ($F('expiration_month') != '0' && $F('expiration_year') != '0') {
                changeLabelColor($('expiration_month'), 'valid');
            }
            else if ($F('expiration_month') == '0' && $F('expiration_year') == '0') {
                changeLabelColor($('expiration_month'), 'clear');
            }
        });
    });
    $('cvv').observe('change', function() {
        var regex = /^\d{3,4}$/;
        if (!$F('cvv').strip().match(regex) && $F('cvv').strip().length != 0) {
            changeLabelColor($('cvv'), 'error');
        }
        else if ($F('cvv').strip().match(regex)) {
            changeLabelColor($('cvv'), 'valid');
        }
        else if ($F('cvv').strip().length == 0) {
            changeLabelColor($('cvv'), 'clear');
        }
    });
    $('email').observe('change', function() {
        var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/;
        if (!$F('email').match(email_regex) && $F('email_address').length != 0) {
            changeLabelColor($('email'), 'error');
        }
        else if ($F('email').match(email_regex)) {
            changeLabelColor($('email'), 'valid');
        }
        else if ($F('email').length == 0) {
            changeLabelColor($('email'), 'clear');
        }
    });
    ['billing_zip','shipping_zip'].each(function(f) {
        $(f).observe('change', function() {
            var regex = /^\d{5}$/;
            if (!$F(f).match(regex) && $F(f).length != 0) {
                changeLabelColor($(f), 'error');
            }
            else if ($F(f).match(regex)) {
                changeLabelColor($(f), 'valid');
            }
            else if ($(f).length == 0) {
                changeLabelColor($(f), 'clear');
            }
        });
    });
    ['billing_state','shipping_state'].each(function(f) {
        $(f).observe('change', function() {
            if ($F(f) != 0) {
                changeLabelColor($(f), 'valid');
            }
            else if ($F(f) == 0) {
                changeLabelColor($(f), 'clear');
            }
        });
    });
    ['cardholder_first_name','cardholder_last_name','billing_address','billing_city','telephone','recipient_first_name','recipient_last_name','shipping_address','shipping_city'].each(function(f) {
        $(f).observe('change', function() {
            if ($(f).value.strip().length != 0) {
                changeLabelColor($(f), 'valid');
            }
            else if ($(f).value.strip().length == 0) {
                changeLabelColor($(f), 'clear');
            }
        });
    });
});