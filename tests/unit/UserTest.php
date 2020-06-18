<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function testThatWeCanGetTheFirstName()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Moamer');

        $this->assertEquals($user->getFirstName(), 'Moamer');
    }

    /** @test */
    public function testThatWeCanGetTheLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName('Jusupovic');

        $this->assertEquals($user->getLastName(), 'Jusupovic');
    }

    /** @test */
    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Moamer');
        $user->setLastName('Jusupovic');

        $this->assertEquals($user->getFullName(), 'Moamer Jusupovic');
    }

    /** @test */
    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new \App\Models\User;
        $user->setFirstName('   Moamer      ');
        $user->setLastName('            Jusupovic');

        $this->assertEquals($user->getFirstName(), 'Moamer');
        $this->assertEquals($user->getLastName(), 'Jusupovic');
    }

    /** @test */
    public function testEmailAddressCanBeSet()
    {
        $user = new \App\Models\User;
        $user->setEmail('moamer@live.com');

        $this->assertEquals($user->getEmail(), 'moamer@live.com');
    }

    /** @test */
    public function testEmailVariablesContainCorrectValues()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Moamer');
        $user->setLastName('Jusupovic');
        $user->setEmail('moamer@live.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Moamer Jusupovic');
        $this->assertEquals($emailVariables['email'], 'moamer@live.com');
    }
}