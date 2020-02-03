<?php


class Tags
{


    public function get_Tags($conn)
    {
        $query ="SELECT id,label,link,views FROM tags";
        $statment = $conn->prepare($query);
        $statment->execute();
        $getdata = $statment->fetchall(PDO::FETCH_ASSOC);



        return $getdata;

    }


}
