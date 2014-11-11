<?php

class Room extends Eloquent {
    
        public function test() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->hasMany('Test');
    }

}