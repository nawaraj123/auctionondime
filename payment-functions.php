<?php
    function sanitize($value)
    {
        return trim(strip_tags($value));
    }

    function validateCreditcard_number($credit_card_number)
    {
        $firstnumber = substr($credit_card_number, 0, 1);

        switch ($firstnumber)
        {
            case 3:
                if (!preg_match('/^3\d{3}[ \-]?\d{6}[ \-]?\d{5}$/', $credit_card_number))
                {
                    return false;
                }
                break;
            case 4:
                if (!preg_match('/^4\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number))
                {
                    return false;
                }
                break;
            case 5:
                if (!preg_match('/^5\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number))
                {
                    return false;
                }
                break;
            case 6:
                if (!preg_match('/^6011[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number))
                {
                    return false;
                }
                break;
            default:
                return false;
        }

        $credit_card_number = str_replace('-', '', $credit_card_number);
        $map = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 2, 4, 6, 8, 1, 3, 5, 7, 9);
        $sum = 0;
        $last = strlen($credit_card_number) - 1;
        for ($i = 0; $i <= $last; $i++)
        {
            $sum += $map[$credit_card_number[$last - $i] + ($i & 1) * 10];
        }
        if ($sum % 10 != 0)
        {
            return false;
        }

        return true;
    }

    function validateCreditCardExpirationDate($month, $year)
    {
        if (!preg_match('/^\d{1,2}$/', $month))
        {
            return false;
        }
        else if (!preg_match('/^\d{4}$/', $year))
        {
            return false;
        }
        else if ($year < date("Y"))
        {
            return false;
        }
        else if ($month < date("m") && $year == date("Y"))
        {
            return false;
        }
        return true;
    }

    function validateCVV($cardNumber, $cvv)
    {
        $firstnumber = (int) substr($cardNumber, 0, 1);
        if ($firstnumber === 3)
        {
            if (!preg_match("/^\d{4}$/", $cvv))
            {
                return false;
            }
        }
        else if (!preg_match("/^\d{3}$/", $cvv))
        {
            return false;
        }
        return true;
    }
?>