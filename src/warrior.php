<?php 

namespace Warrior;

class Warrior {
    private $level;
    private $experience;
    private $rank;
    private $ranks = ["Pushover", "Novice", "Fighter", "Warrior", "Veteran", "Sage", "Elite", "Conqueror", "Champion", "Master", "Greatest"];
    private $trainingHistory = [];

    public function __construct() {
        $this->level = 1;
        $this->experience = 0;
        $this->rank = $this->ranks[0];
    }

    public function getLevel() {
        return $this->level;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function getRank() {
        return $this->rank;
    }

    private function updateRank() {
        $this->rank = $this->ranks[intval(($this->level - 1) / 10)];
    }

    private function addExperience($exp) {
        $this->experience += $exp;
        while ($this->experience >= 100 && $this->level < 100) {
            $this->experience -= 100;
            $this->level++;
            $this->updateRank();
        }
        if ($this->level == 100) {
            $this->experience = 10000;
        }
    }

    public function battle($enemyLevel) {
        if ($enemyLevel < 1 || $enemyLevel > 100) {
            return "Invalid level";
        }

        $levelDiff = $enemyLevel - $this->level;

        if ($levelDiff == 0) {
            $this->addExperience(10);
            return "A good fight";
        } elseif ($levelDiff == -1) {
            $this->addExperience(5);
            return "A good fight";
        } elseif ($levelDiff <= -2) {
            return "Easy fight";
        } elseif ($levelDiff >= 1) {
            if ($enemyLevel >= $this->level + 5 && array_search($this->rank, $this->ranks) < array_search($this->ranks[intval(($enemyLevel - 1) / 10)], $this->ranks)) {
                return "You've been defeated";
            }
            $this->addExperience(20 * $levelDiff * $levelDiff);
            return "An intense fight";
        }
    }

    public function training($description, $exp, $minLevel) {
        if ($this->level >= $minLevel) {
            $this->addExperience($exp);
            $this->trainingHistory[] = $description;
            return $description;
        } else {
            return "Not strong enough";
        }
    }
}
?>