<?php
class Comment
{
    public $id, $id_user, $id_sp, $comment;
    public function set_comment_from_db($id, $id_user, $id_sp, $comment)
    {
        $this->comment = $comment;
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_sp = $id_sp;
    }
    public function set_comment_from_form($id_user, $id_sp, $comment)
    {
        $this->comment = $comment;
        $this->id_user = $id_user;
        $this->id_sp = $id_sp;
    }
    public function get_comment()
    {
        return [
            "id" => $this->id,
            "comment" => $this->comment,
            "id_user" => $this->id_user,
            "id_sp" => $this->id_sp
        ];
    }
}
