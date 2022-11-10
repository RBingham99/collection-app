<?php
require_once '../php/collectorsappfunctions.php';
use PHPUnit\Framework\TestCase;

class collectorsappfunctions extends TestCase
{
    //Add to HTML function
    //Success test
    public function test_AddToHTML_GivenArrayExpectPrintedInHTML()
    {
        $input = [[
            'pic_link'=>'../images/anet.jpg',
            'pic_alt'=>'hi',
            'name/species'=>'hi',
            'nickname'=>'hi',
            'average_height'=>'hi'
        ]];

        $expected =
            '<div class = "card">'
                . '<div class = "plantImg">'
                    . '<img src = "../images/anet.jpg" alt="hi">'
                . '</div>'
                    . '<h2>Nickname: hi</h2>'
                    . '<p>Species: hi</p>'
                    . '<p>Height: hi</p>'
            . '</div>';

        $result = addToHTML($input);
        $this->assertEquals($expected, $result);
    }

    //Failure tests
    public function test_AddToHTML_GivenEmptyArrayThrowError()
    {
        $input = [];

        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('No data from database');

        $result = addToHTML($input);
    }

    public function test_AddToHTML_GivenArrayWithNoValuesThrowError()
    {
        $input = [[
            'pic_link',
            'pic_alt',
            'name/species',
            'nickname',
            'average_height'
        ]];

        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Values not set');

        $result = addToHTML($input);
    }

    //Malformed test
    public function test_AddToHTML_GivenIntThrowError()
    {
        $input = 1;

        $this->expectException(TypeError::class);

        $result = addToHTML($input);
    }

    //Add new item to database function
    //Failure tests
    public function test_AddNewItemToDatabase_GivenEmptyArrayThrowError()
    {
        $input = [];
        $database = connectToDatabase();

        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('No data from database');

        $result = addNewItemToDatabase($input, $database);
    }

    public function test_AddNewItemToDatabase_GivenArrayWithNoValuesThrowError()
    {
        $input = [
            'pic_link',
            'pic_alt',
            'name/species',
            'nickname',
            'average_height'
        ];
        $database = connectToDatabase();

        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Values not set');

        $result = addNewItemToDatabase($input, $database);
    }

    //Malformed test
    public function test_AddNewItemtoDatabase_GivenIntThrowError()
    {
        $input = 1;

        $this->expectException(TypeError::class);

        $result = addNewItemToDatabase($input);
    }

    //Sanitise data function
    //Success test
    public function test_sanitiseFormData_givenArrayWhitespace()
    {
        $input = [
            'key' => '   Value     ',
        ];
        $expected = [
            'key' => 'Value',
        ];
        $result = sanitiseFormData($input);
        $this->assertEquals($expected, $result);
    }

    public function test_sanitiseFormData_givenArrayHTML()
    {
        $input = [
            'key' => '<div>Test</div>'
        ];
        $expected = [
            'key' => '&lt;div&gt;Test&lt;/div&gt;'
        ];
        $result = sanitiseFormData($input);
        $this->assertEquals($expected, $result);
    }

    public function test_sanitiseFormData_givenArrayEmpty()
    {
        $input = [];
        $expected = [];
        $result = sanitiseFormData($input);
        $this->assertEquals($expected, $result);
    }

    //Malformed test
    public function test_sanitiseFormData_givenInt()
    {
        $input = 1;
        $this->expectException(TypeError::class);
        $result = sanitiseFormData($input);
    }
}