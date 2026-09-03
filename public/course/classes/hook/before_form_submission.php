<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace core_course\hook;

/**
 * Allows plugins to extend course form submission.
 *
 * This is called on submission of the course edit form in BEFORE the course has been saved. Changes to the submitted data will be
 * reflected in the DB.
 *
 * @package    core_course
 * @copyright  2026 Lars Bonczek (@innoCampus, TU Berlin)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#[\core\attribute\label('Allows plugins or features to perform actions before the course editing form is saved')]
#[\core\attribute\tags('course')]
class before_form_submission {
    /**
     * Creates new hook.
     *
     * @param \stdClass $data Submitted data
     * @param bool $isnewcourse Whether this is a new course
     */
    public function __construct(
        /** @var \stdClass The data that was submitted in the course edit form */
        protected \stdClass $data,
        /** @var bool Whether this is a new course */
        public readonly bool $isnewcourse = false,
    ) {
    }

    /**
     * Returns the submitted data. Changes to this object will be reflected in the DB.
     *
     * @return \stdClass
     */
    public function get_data(): \stdClass {
        return $this->data;
    }
}
