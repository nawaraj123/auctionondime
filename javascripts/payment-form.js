document.observe('dom:loaded', function() {
    // The paragraph that contains the "email" form field
    var email_p = $('email').up('p');

    // Create the <p> tag that will contain our checkbox
    var p = new Element('p');

    // Create our checkbox
    var checkbox = new Element('input', {'type': 'checkbox', 'id': 'copybilling'});

    // Append the checkbox to the new <p>
    p.appendChild(checkbox);

    // Create our text explaining what this checkbox does
    var b = new Element('b').update('Copy billing address information to the shipping address');

    // Append the checkbox to the new <p>
    p.appendChild(b);

    // Create our text explaining what this checkbox does
    // Insert the new <p> tag after the paragraph with the "email" field
    Element.insert(email_p, {'after': p});

    // When the checkbox is clicked either copy or clear the shipping form fields
    $('copybilling').observe('click', function() {
        if ($('copybilling').checked == true) {
            // The checkbox is checked, copy the information over
            $('recipient_first_name').value = $F('cardholder_first_name');
            $('recipient_last_name').value  = $F('cardholder_last_name');
            $('shipping_address').value     = $F('billing_address');
            $('shipping_address2').value    = $F('billing_address2');
            $('shipping_city').value        = $F('billing_city');
            $('shipping_state').value       = $F('billing_state');
            $('shipping_zip').value         = $F('billing_zip');
        }
        else {
            // The checkbox is unchecked, remove any unchanged fields
            if ($('recipient_first_name').value == $('cardholder_first_name').value) {
                $('recipient_first_name').value = '';
            }
            if ($('recipient_last_name').value == $('cardholder_last_name').value) {
                $('recipient_last_name').value = '';
            }
            if ($('shipping_address').value == $('billing_address').value) {
                $('shipping_address').value = '';
            }
            if ($('shipping_address2').value == $('billing_address2').value) {
                $('shipping_address2').value = '';
            }
            if ($('shipping_city').value == $('billing_city').value) {
                $('shipping_city').value = '';
            }
            if ($('shipping_state').value == $('billing_state').value) {
                $('shipping_state').value = '';
            }
            if ($('shipping_zip').value == $('billing_zip').value) {
                $('shipping_zip').value = '';
            }
        }
    });
});