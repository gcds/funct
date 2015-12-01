<?php

namespace Funct\Strings;

/**
 * Extracts the string between two substrings
 *
 * @param string $input
 * @param string $left
 * @param string $right
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function between($input, $left, $right)
{
    $input = ' ' . $input;
    $ini   = strpos($input, $left);

    if ($ini == 0) {
        return '';
    }

    $ini += strlen($left);
    $len = strpos($input, $right, $ini) - $ini;

    return substr($input, $ini, $len);
}


/**
 * Camelizes string
 *
 * @param string $input
 * @param bool   $firstLetterUppercase
 *
 * @return string
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function camelize($input, $firstLetterUppercase = false)
{
    $input = trim($input);

    if ($firstLetterUppercase) {
        $input = upperCaseFirst($input);
    } else {
        $input = lowerCaseFirst($input);
    }

    $input = preg_replace('/^[-_]+/', '', $input);

    $input = preg_replace_callback(
        '/[-_\s]+(.)?/u',
        function ($match) {
            if (isset($match[1])) {
                return strtoupper($match[1]);
            } else {
                return '';
            }
        },
        $input
    );

    $input = preg_replace_callback(
        '/[\d]+(.)?/u',
        function ($match) {
            return strtoupper($match[0]);
        },
        $input
    );

    return $input;
}


/**
 * Removes prefix from start of string
 *
 * @param string $input
 * @param string $prefix
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function chompLeft($input, $prefix)
{
    if (startsWith($input, $prefix)) {
        return mb_substr($input, mb_strlen($prefix));
    }

    return $input;
}

/**
 * Removes suffix from end of string
 *
 * @param string $input
 * @param string $suffix
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function chompRight($input, $suffix)
{
    if (endsWith($input, $suffix)) {

        return mb_substr($input, 0, mb_strlen($input) - mb_strlen($suffix));
    }

    return $input;
}

/**
 * Converts string to camelized class name. First letter is always upper case
 *
 * @param string $string
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function classify($string)
{
    return camelize($string, true);
}


/**
 * Collapse multiple spaces
 *
 * @param string $input
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function collapseWhitespace($input)
{
    return preg_replace('/\s+/u', ' ', $input);
}

/**
 * Check if string contains substring
 *
 * @param string $input
 * @param string $substring
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function contains($input, $substring)
{
    return mb_strpos($input, $substring) !== false;
}

/**
 * Count the occurrences of substring in string
 *
 * @param string $input
 * @param string $substring
 *
 * @return int
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function countOccurrences($input, $substring)
{
    return mb_substr_count($input, $substring);
}


/**
 * Converts hyphens and camel casing to underscores
 *
 * @param string $string
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function dasherize($string)
{
    return strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', str_replace('_', '-', $string)));
}


/**
 * Check if string ends with substring
 *
 * @param string $input
 * @param string $substring
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function endsWith($input, $substring)
{
    return mb_substr($input, -strlen($substring)) === $substring;
}

/**
 * Alias of contains
 *
 * @param string $input
 * @param string $substring
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function includes($input, $substring)
{
    return contains($input, $substring);
}


/**
 * Check if string contains only letters
 *
 * @param string $input
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function isAlpha($input)
{
    return ctype_alpha($input);
}

/**
 * Check if string contains only alphanumeric
 *
 * @param string $input
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function isAlphaNumeric($input)
{
    return ctype_alnum($input);
}

/**
 * Checks if letters in given string are all lowercase.
 *
 * @param string $input
 * @param bool   $mb
 *
 * @return bool
 *
 * @author Ernestas Kvedaras <kvedaras.ernestas@gmail.com>
 */
function isLower($input, $mb = false)
{
    return $mb
        ? mb_strtolower($input, mb_detect_encoding($input, 'auto')) === $input
        : strtolower($input) === $input;
}


/**
 * Check if string contains only digits
 *
 * @param string $input
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function isNumeric($input)
{
    return ctype_digit($input);
}

/**
 * Checks if letters in given string are all uppercase.
 *
 * @param string $input
 * @param bool   $mb
 *
 * @return bool
 *
 * @author Ernestas Kvedaras <kvedaras.ernestas@gmail.com>
 */
function isUpper($input, $mb = false)
{
    return $mb
        ? mb_strtoupper($input, mb_detect_encoding($input, 'auto')) === $input
        : strtoupper($input) === $input;
}


/**
 * Remove accents from latin characters
 *
 * @param string $input
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function latinize($input)
{
    $table = [
        'À' => 'A',
        'Á' => 'A',
        'Â' => 'A',
        'Ã' => 'A',
        'Ä' => 'A',
        'Å' => 'A',
        'Ă' => 'A',
        'Ā' => 'A',
        'Ą' => 'A',
        'Æ' => 'Ae',
        'Ǽ' => 'Ae',
        'à' => 'a',
        'á' => 'a',
        'â' => 'a',
        'ã' => 'a',
        'ä' => 'a',
        'å' => 'a',
        'ă' => 'a',
        'ā' => 'a',
        'ą' => 'a',
        'æ' => 'ae',
        'ǽ' => 'ae',

        'Þ' => 'B',
        'þ' => 'b',
        'ß' => 'ss',

        'Ç' => 'C',
        'Č' => 'C',
        'Ć' => 'C',
        'Ĉ' => 'C',
        'Ċ' => 'C',
        'ç' => 'c',
        'č' => 'c',
        'ć' => 'c',
        'ĉ' => 'c',
        'ċ' => 'c',

        'Đ' => 'Dj',
        'Ď' => 'D',
        'Đ' => 'D',
        'đ' => 'dj',
        'ď' => 'd',

        'È' => 'E',
        'É' => 'E',
        'Ê' => 'E',
        'Ë' => 'E',
        'Ĕ' => 'E',
        'Ē' => 'E',
        'Ę' => 'E',
        'Ė' => 'E',
        'è' => 'e',
        'é' => 'e',
        'ê' => 'e',
        'ë' => 'e',
        'ĕ' => 'e',
        'ē' => 'e',
        'ę' => 'e',
        'ė' => 'e',

        'Ĝ' => 'G',
        'Ğ' => 'G',
        'Ġ' => 'G',
        'Ģ' => 'G',
        'ĝ' => 'g',
        'ğ' => 'g',
        'ġ' => 'g',
        'ģ' => 'g',

        'Ĥ' => 'H',
        'Ħ' => 'H',
        'ĥ' => 'h',
        'ħ' => 'h',

        'Ì' => 'I',
        'Í' => 'I',
        'Î' => 'I',
        'Ï' => 'I',
        'İ' => 'I',
        'Ĩ' => 'I',
        'Ī' => 'I',
        'Ĭ' => 'I',
        'Į' => 'I',
        'ì' => 'i',
        'í' => 'i',
        'î' => 'i',
        'ï' => 'i',
        'į' => 'i',
        'ĩ' => 'i',
        'ī' => 'i',
        'ĭ' => 'i',
        'ı' => 'i',

        'Ĵ' => 'J',
        'ĵ' => 'j',

        'Ķ' => 'K',
        'ķ' => 'k',
        'ĸ' => 'k',

        'Ĺ' => 'L',
        'Ļ' => 'L',
        'Ľ' => 'L',
        'Ŀ' => 'L',
        'Ł' => 'L',
        'ĺ' => 'l',
        'ļ' => 'l',
        'ľ' => 'l',
        'ŀ' => 'l',
        'ł' => 'l',

        'Ñ' => 'N',
        'Ń' => 'N',
        'Ň' => 'N',
        'Ņ' => 'N',
        'Ŋ' => 'N',
        'ñ' => 'n',
        'ń' => 'n',
        'ň' => 'n',
        'ņ' => 'n',
        'ŋ' => 'n',
        'ŉ' => 'n',

        'Ò' => 'O',
        'Ó' => 'O',
        'Ô' => 'O',
        'Õ' => 'O',
        'Ö' => 'O',
        'Ø' => 'O',
        'Ō' => 'O',
        'Ŏ' => 'O',
        'Ő' => 'O',
        'Œ' => 'Oe',
        'ò' => 'o',
        'ó' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'ö' => 'o',
        'ø' => 'o',
        'ō' => 'o',
        'ŏ' => 'o',
        'ő' => 'o',
        'œ' => 'oe',
        'ð' => 'o',

        'Ŕ' => 'R',
        'Ř' => 'R',
        'ŕ' => 'r',
        'ř' => 'r',
        'ŗ' => 'r',

        'Š' => 'S',
        'Ŝ' => 'S',
        'Ś' => 'S',
        'Ş' => 'S',
        'š' => 's',
        'ŝ' => 's',
        'ś' => 's',
        'ş' => 's',

        'Ŧ' => 'T',
        'Ţ' => 'T',
        'Ť' => 'T',
        'ŧ' => 't',
        'ţ' => 't',
        'ť' => 't',

        'Ù' => 'U',
        'Ú' => 'U',
        'Û' => 'U',
        'Ü' => 'U',
        'Ũ' => 'U',
        'Ū' => 'U',
        'Ŭ' => 'U',
        'Ů' => 'U',
        'Ű' => 'U',
        'Ų' => 'U',
        'ù' => 'u',
        'ú' => 'u',
        'û' => 'u',
        'ü' => 'u',
        'ũ' => 'u',
        'ū' => 'u',
        'ŭ' => 'u',
        'ů' => 'u',
        'ű' => 'u',
        'ų' => 'u',

        'Ŵ' => 'W',
        'Ẁ' => 'W',
        'Ẃ' => 'W',
        'Ẅ' => 'W',
        'ŵ' => 'w',
        'ẁ' => 'w',
        'ẃ' => 'w',
        'ẅ' => 'w',

        'Ý' => 'Y',
        'Ÿ' => 'Y',
        'Ŷ' => 'Y',
        'ý' => 'y',
        'ÿ' => 'y',
        'ŷ' => 'y',

        'Ž' => 'Z',
        'Ź' => 'Z',
        'Ż' => 'Z',
        'Ž' => 'Z',
        'ž' => 'z',
        'ź' => 'z',
        'ż' => 'z',
        'ž' => 'z',
    ];

    $string = strtr($input, $table);

    return $string;
}


/**
 * Return the substring denoted by n positive left-most characters
 *
 * @param string $string
 * @param int    $n
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function left($string, $n)
{
    $start = 0;
    if ($n < 0) {
        $start = $n;
        $n     = -$n;
    }

    return substr($string, $start, $n);
}


/**
 * Returns an array with the lines. Cross-platform compatible
 *
 * @param string $string
 *
 * @return array
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function lines($string)
{
    return preg_split('/\r\n|\n|\r/', $string);
}


/**
 * Converts string first char to lowercase
 *
 * @param string $input
 *
 * @return string
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function lowerCaseFirst($input)
{
    return lcfirst($input);
}


/**
 * Pads the string in the center with specified character. char may be a string or a number, defaults is a space
 *
 * @param string $string
 * @param int    $length
 * @param string $char
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function pad($string, $length, $char = ' ')
{
    return str_pad($string, $length, $char, STR_PAD_BOTH);
}


/**
 * Left pads the string
 *
 * @param string $input
 * @param string $length
 * @param string $char
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function padLeft($input, $length, $char = ' ')
{
    return str_pad($input, $length, $char, STR_PAD_LEFT);
}


/**
 * Right pads the string
 *
 * @param string $input
 * @param string $length
 * @param string $char
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function padRight($input, $length, $char = ' ')
{
    return str_pad($input, $length, $char, STR_PAD_RIGHT);
}


/**
 * Repeat the string n times
 *
 * @param string $input
 * @param int    $n
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function repeat($input, $n)
{
    return str_repeat($input, $n);
}

/**
 * Return the substring denoted by n positive right-most characters
 *
 * @param string $string
 * @param int    $n
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function right($string, $n)
{
    $start = -$n;
    if ($n < 0) {
        $start = 0;
        $n     = -$n;
    }

    return substr($string, $start, $n);
}


/**
 * Converts the text into a valid url slug. Removes accents from Latin characters
 *
 * @param string $string
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function slugify($string)
{
    $string = latinize($string);
    $string = preg_replace('~[^\\pL\d]+~u', '-', $string);
    $string = trim($string, '-');
    $string = strtolower($string);

    return preg_replace('~[^-\w]+~', '', $string);
}


/**
 * Check if string starts with substring
 *
 * @param string $input
 * @param string $substring
 *
 * @return bool
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function startsWith($input, $substring)
{
    return mb_strpos($input, $substring) === 0;
}

/**
 * Returns a new string with all occurrences of [string1],[string2],... removed.
 *
 * @param string $string
 * @param string $string1
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function strip($string, $string1)
{
    $arguments = func_get_args();

    return str_replace(array_slice($arguments, 1), '', $string);
}


/**
 * Strip all of the punctuation
 *
 * @param string $string
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function stripPunctuation($string)
{
    return preg_replace('/[^\w\s]|_/', '', $string);
}


/**
 * Repeat the string n times
 *
 * @param string $input
 * @param int    $n
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function times($input, $n)
{
    return repeat($input, $n);
}

/**
 * Creates a title version of the string. Capitalizes all the words and replaces some characters in the string to
 * create a nicer looking title. string_titleize is meant for creating pretty output
 *
 * @param string $string
 * @param array  $ignore
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function titleize($string, array $ignore = [])
{
    $string = preg_replace('/(?<!^)([A-Z])/', ' $1', $string);
    $string = preg_replace('/[^a-z0-9:]+/i', ' ', $string);
    $string = trim($string);

    return preg_replace_callback(
        '/([\S]+)/u',
        function ($match) use ($ignore) {
            if (in_array(strtolower($match[0]), $ignore)) {
                return $match[0];
            } else {
                return ucfirst(strtolower($match[0]));
            }
        },
        $string
    );
}


/**
 * Join an array into a human readable sentence
 *
 * @param array  $array
 * @param string $delimiter
 * @param string $lastDelimiter
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function toSentence($array, $delimiter = ', ', $lastDelimiter = ' and ')
{
    $lastWord = array_pop($array);

    return implode($delimiter, $array) . $lastDelimiter . $lastWord;
}


/**
 * The same as string_to_sentence, but adjusts delimeters to use Serial comma)
 *
 * @param array  $array
 * @param string $delimiter
 * @param string $lastDelimiter
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function toSentenceSerial($array, $delimiter = ', ', $lastDelimiter = ' and ')
{
    $lastWord = array_pop($array);

    $lastDel = '';
    if (count($array) > 1) {
        $lastDel = trim($delimiter, ' ');
    }

    return implode($delimiter, $array) . $lastDel . $lastDelimiter . $lastWord;
}


/**
 * Truncate string accounting for word placement and character count
 *
 * @param  string $input
 * @param  int    $length
 * @param  string $chars
 *
 * @return string
 *
 * @author Lucantis Swann <lucantis.swann@gmail.com>
 */
function truncate($input, $length, $chars = '…')
{
    if (strlen($input) > $length) {
        $splits = preg_split('/([\s\n\r]+)/u', $input, null, PREG_SPLIT_DELIM_CAPTURE);

        $splits_length = 0;
        for ($last_split = 0; $last_split < count($splits); ++$last_split) {
            $splits_length += strlen($splits[$last_split]);
            if ($splits_length > $length) {
                break;
            }
        }

        return implode(array_slice($splits, 0, $last_split)) . $chars;
    } else {
        return $input;
    }
}


/**
 * Converts hyphens and camel casing to underscores
 *
 * @param string $string
 *
 * @return string
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function underscore($string)
{
    return strtolower(preg_replace('/(?<!^)([A-Z])/', '_$1', str_replace('-', '_', $string)));
}


/**
 * Converts string first char to uppercase
 *
 * @param string $input
 *
 * @return string
 *
 * @author Aurimas Niekis <aurimas@niekis.lt>
 */
function upperCaseFirst($input)
{
    return ucfirst($input);
}

