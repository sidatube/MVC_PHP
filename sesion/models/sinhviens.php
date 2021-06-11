<?php
include_once "controllers/database.php";
include_once "modal.php";
class Sinhviens implements modal{
    private $table = "sinhviens";
    private $primarykey = "id";
    protected $fillable = [
      "name",
      "age",
      "address"
    ];
    public function all()
    {
        $sql_txt = "select * from $this->table";
        return queryDB($sql_txt);
    }

    public function find($id)
    {
        $sql = "select * from $this->table where $this->primarykey = $id";
        $ds= queryDB($sql);
        if (count($ds)>0) return $ds[0];
        return null;
    }

    public function save(array $data)
    {
        $arr=[];
        foreach ($this->fillable as $key){
            if ($key="age"){
                $arr[]=$data[$key];
            }else{
                $arr[]="'".$data[$key]."'";
            }
        }
        $txt= implode(",",$arr);
        $sql_txt= "insert into $this->table (name,age,address) values ($txt)";
        return insertorupdateDB($sql_txt);
        // TODO: Implement save() method.
    }

    public function update(array $data, $id)
    {
        $arr=[];
        foreach ($this->fillable as $key){
            if ($key="age"){
                $arr[] = "age =".$data[$key];
            }else{
                $arr[] = $key." = '".$data[$key]."'";
            }
        }
        $txt= implode(",",$arr);
        $sql_txt= "update $this->table set $txt  where $this->primarykey =$id";
        return insertorupdateDB($sql_txt);
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $sql = "delete from $this->table where $this->primarykey = $id";
        return insertorupdateDB($sql);
        // TODO: Implement delete() method.
    }

}
