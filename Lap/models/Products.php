<?php
include_once "Modal.php";
include_once "controllers/database.php";
class Products implements Modal {
    private $primarykey = "id";
    private $tableProducts = "products";
    private $tableCategory = "procategory";
    protected $fillPro = [
      "name","gia","mota","ncc"
    ];
    protected $fillCate=[ "name"];
    public function all()
    {
        $sql_txt = "select * from $this->tableProducts";
        return queryDB($sql_txt);
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        $sql_txt="select * from $this->tableProducts where $this->primarykey = $id";
        $ds=queryDB($sql_txt);
        if (count($ds)>0) return $ds[0];
        return  null;
        // TODO: Implement find() method.
    }

    public function save(array $data)
    {
        $arr=[];
        foreach ( $this->fillPro as $key){
            if ($key =="gia"){
                $arr[]=$data[$key];
            }else{
                $arr[]= "'".$data[$key]."'";
            }
        }
        $txt = implode(",",$arr);
        $sql_txt = "insert into $this->tableProducts (name,gia,mota,ncc) values ($txt)";
        return insertorupdateDB($sql_txt);
        // TODO: Implement save() method.
    }

    public function update(array $data, $id)
    {
        $arr=[];
        foreach ($this->fillPro as $key){
            if ($key = "gia"){
                $arr[] = "gia = ".$data[gia];
            }else{
                $arr[]= $key."= '".$data[$key]."'";
            }
        }
        $txt = implode(",",$arr);
        $sql_txt = "update $this->tableProducts set $txt where $this->primarykey=$id";
        return insertorupdateDB($sql_txt);
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $sql_txt = "delete from $this->tableProducts where $this->primarykey = $id";
        return insertorupdateDB($sql_txt);
        // TODO: Implement delete() method.
    }

}