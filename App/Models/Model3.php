<?php


namespace App\Models;


class Model3 extends Db
{
    const DBNAME = 'test3';

    public $tree = null;

    public function fillTable($tableName = self::TABLE)
    {
        if (!$this->checkTable($tableName)){
            $this->createTable($tableName);
        }
        $values='';
        for($i=0; $i<100; $i++){
            $parent = rand(0,$i);
            $values .= ', (\'user' . $i . '\', ' . $parent . ')';
        }

        $sql = 'INSERT INTO ' . $tableName . ' (name, parent) VALUES ' . substr($values,1) . ';';

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