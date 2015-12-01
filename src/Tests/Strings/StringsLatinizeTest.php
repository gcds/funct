<?php

namespace Funct\Tests\Strings;

use Funct\Strings;

/**
 * Class StringsLatinizeTest
 *
 * @package Funct\Tests\Strings
 * @author Lucantis Swann <lucantis.swann@gmail.com>
*/
class StringsLatinizeTest extends \PHPUnit_Framework_TestCase
{
    public function dataStringLatinize()
    {
        $out = [];

        $out[] = ['Dès Noël où un zéphyr haï me vêt de glaçons würmiens je dîne d’exquis rôtis de bœuf au kir à l’aÿ d’âge mûr & cætera !',
            'Des Noel ou un zephyr hai me vet de glacons wurmiens je dine d’exquis rotis de boeuf au kir a l’ay d’age mur & caetera !'];
        $out[] = ['Benjamín pidió una bebida de kiwi y fresa; Noé, sin vergüenza, la más exquisita champaña del menú.',
            'Benjamin pidio una bebida de kiwi y fresa; Noe, sin verguenza, la mas exquisita champana del menu.'];
        $out[] = ['Falsches Üben von Xylophonmusik quält jeden größeren Zwerg.',
            'Falsches Uben von Xylophonmusik qualt jeden grosseren Zwerg.'];

        return $out;
    }

    /**
     * @dataProvider dataStringLatinize
     *
     * @param string $input
     * @param string $expected
     */
    public function testStringLatinize($input, $expected)
    {
        $this->assertEquals($expected, Strings\latinize($input));
    }
}
