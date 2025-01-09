<?php

use PHPUnit\Framework\TestCase;
use Warrior\Warrior;

class WarriorTest extends TestCase {
    public function testInitialValues() {
        $warrior = new Warrior();
        $this->assertEquals(1, $warrior->getLevel());
        $this->assertEquals(0, $warrior->getExperience());
        $this->assertEquals("Pushover", $warrior->getRank());
    }

    public function testBattleSameLevel() {
        $warrior = new Warrior();
        $result = $warrior->battle(1);
        $this->assertEquals("A good fight", $result);
        $this->assertEquals(10, $warrior->getExperience());
        $this->assertEquals(1, $warrior->getLevel());
    }

    public function testBattleHigherLevel() {
        $warrior = new Warrior();
        $result = $warrior->battle(3);
        $this->assertEquals("An intense fight", $result);
        $this->assertEquals(80, $warrior->getExperience());
        $this->assertEquals(1, $warrior->getLevel());
    }

    public function testBattleLowerLevel() {
        $warrior = new Warrior();
        $result = $warrior->battle(1);
        $this->assertEquals("A good fight", $result);
        $result = $warrior->battle(0);
        $this->assertEquals("Invalid level", $result);
    }

    public function testTraining() {
        $warrior = new Warrior();
        $result = $warrior->training("Basic training", 50, 1);
        $this->assertEquals("Basic training", $result);
        $this->assertEquals(50, $warrior->getExperience());
        $this->assertEquals(1, $warrior->getLevel());
    }

    public function testTrainingNotStrongEnough() {
        $warrior = new Warrior();
        $result = $warrior->training("Advanced training", 200, 2);
        $this->assertEquals("Not strong enough", $result);
        $this->assertEquals(0, $warrior->getExperience());
        $this->assertEquals(1, $warrior->getLevel());
    }
}
?>