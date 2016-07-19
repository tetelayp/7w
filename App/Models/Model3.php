<?php


namespace App\Models;


class Model3 extends Db
{
    //const DBNAME = 'test3'; //таблица с колонками id,name,parent

    public $tree = null;

    public function fillTable($tableName = self::TABLE)
    {
        if (!$this->checkTable($tableName)){
            $this->createTable($tableName);
        }

         $values = ',
        (1, \'EEE\', 0),
        (2, \'RE\', 0),
        (5, \'LO\', 0),
        (6, \'DF\', 0),
        (9, \'PPP\', 0),
        (10, \'KK\', 1),
        (13, \'LK\', 1),
        (14, \'EW\', 5),
        (17, \'FS\', 5),
        (18, \'JJJ\', 6),
        (21, \'ED\', 6),
        (22, \'AC\', 6),
        (25, \'WW\', 18),
        (27, \'LL\', 18),
        (28, \'SS\', 27),
        (29, \'SD\', 28),
        (30, \'HR\', 28),
        (31, \'JS\', 30),
        (32, \'ET\', 30),
        (33, \'PP\', 31)';

        /**/
        /*
        $values='';
        /**/
        for($i=0; $i<30; $i++){
            $parent = rand(0,$i+10);
            $values .= ', (NULL, \'user' . $i . '\', ' . $parent . ')';
        }
        /**/
        $sql = 'INSERT INTO ' . $tableName . ' (id, name, parent) VALUES ' . substr($values,1) . ';';

        $this->execute($sql);

    }


    //----------------------
    private function getParent(User $user, array $array){
        for ($i=0; $i<count($array); $i++){
            if ($user->parent == $array[$i]->id){
                return $i;// maybe id???
            }
        }
        return false;
    }

    private function getChild (User $parent, array $array){
        $childArray = [];
        $subChildArray = [];
        foreach ($array as $item){

            if ($parent->id == $item->parent){
                $child = new User();
                $child->id = $item->id;
                $child->name = $item->name;
                $child->parent = $item->parent;
                $child->offset = $parent->offset + 1;
                $childArray[]=$child;

                $subChildArray = $this->getChild($child, $array);
                $childArray = array_merge($childArray, $subChildArray);
            }
        }
        return $childArray;
    }

    public function convertToTree()
    {
        $tree = [];
        $root = [];


        for ($i=0; $i<count($this->queryResult);$i++){
            if (false === $this->getParent($this->queryResult[$i],$this->queryResult)){
                $root[]=$this->queryResult[$i];
            }
        }



        foreach ($root as $item){
            $tree[] = $item;
            $tree = array_merge($tree, $this->getChild($item, $this->queryResult));
        }
        $this->tree = $tree;
        return $tree;

    }
}