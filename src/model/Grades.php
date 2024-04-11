<?php

class Grades {
    private $ids;
    private $grds;

    public function __construct($ids, $grds) {
        $this->ids = preg_split('/\s+/', $ids);
        $this->grds = preg_split('/\s+/', $grds);

        // Check if the lengths of IDs and grades match
        if (count($this->ids) !== count($this->grds)) {
            throw new Exception("The lengths of IDs and grades do not match.");
        }
    }

    public function getGradesByID() {
        $result = [];
        for ($i = 0; $i < count($this->ids); $i++)
            $result[$this->ids[$i]] = $this->grds[$i];
        return $result;
    }
}