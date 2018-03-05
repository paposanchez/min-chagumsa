<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Baum;

class Category extends Baum\Node {

    protected $table = 'categories';
    // 'parent_id' column name

   // 'parent_id' column name
   protected $parentColumn = 'parent_id';

   // 'lft' column name
   protected $leftColumn = 'lidx';

   // 'rgt' column name
   protected $rightColumn = 'ridx';

   // 'depth' column name
   protected $depthColumn = 'nesting';

   // guard attributes from mass-assignment
   protected $guarded = array('id', 'parent_id', 'lidx', 'ridx', 'nesting');

}
