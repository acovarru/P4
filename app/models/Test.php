<?php

class Test extends Eloquent {
    
        public function room() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Room');
    }

}