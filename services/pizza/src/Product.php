<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.03.2018
 * Time: 23:31
 */
class Product extends Settings
{
public function get_order_by_id($id){
    $id = mb_strtolower($id);
    if(preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.'[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $id))
        $id = $this->hash($id);
    return $this->myslqi()->query('SELECT * FROM orders WHERE id="'.$id.'"')->fetch_assoc();
}
public function remove_order_by_id($id){
    return $this->myslqi()->query('DELETE FROM `orders` WHERE id="'.$this->hash($id).'"');
}
public function hash($input){
    return hash('sha256', $input);
}
public function print_report($arr){

        if(!isset($arr)){
            return 'incorrect parameters';
        }
        $str = '<table><tr><td>№</td><td>Title</td><td>Quantity</td><td>Price per one</td><td>Summ</td></tr>';
        $schet =1;
        $summ=0;
        foreach ($arr as $key => $value) {
            $data = $this->get_product_by_id($key);
            $sc = $data['price']*$value;
            $str.= "<tr><td>{$schet}</td><td>{$data['title']}</td><td>{$value}</td><td>{$data['price']}</td><td>".$sc."</td></tr>";
            $summ+=$sc;
            $schet++;
        }
        $str.= '<tr><td align=right colspan="4">Amount  : </td><td>'.$summ.'</td></tr>';
        $str.= '</table>';
        return $str;


}
public function get_categories(){
    return $this->myslqi()->query('SELECT id,title FROM category ORDER BY id ASC')->fetch_all(MYSQLI_ASSOC);
}
public function get_products_by_category_id($category){
    return $this->myslqi()->query('SELECT goods.id,goods.title,goods.description,goods.price FROM goods WHERE goods.category_id='.(int)$category.' ORDER BY goods.id')->fetch_all(MYSQLI_ASSOC);
}
public function get_product_by_id($id){
    return $this->myslqi()->query('SELECT * FROM goods WHERE id='.$id)->fetch_assoc();
}
public function create_order($input1,$input2,$input3){

    $id=UUID::v5(UUID::v4(),duck::close($input1));
    $this->myslqi()->query('INSERT INTO orders (id,timestamp,name,email,goods) VALUES ("'.$this->hash($id).'",'.time().',"'.$this->myslqi()->escape_string(duck::close($input1)).'","'.$this->myslqi()->escape_string(duck::close($input2)).'","'.$this->myslqi()->escape_string(duck::close(json_encode($input3))).'")');
    return $id;
}
public function is_active_order($id){
    if($this->myslqi()->query('SELECT COUNT(*) FROM orders WHERE id="'.$this->hash($id).'"')->fetch_row()[0]!=0){
        return true;
    }else{
        return false;
    }
}
}