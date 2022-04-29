<?php

function convertToSEO($text)
{

    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));
}

function getActiveUser()
{

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if ($user)
        return $user;
    else
        return false;
}

function getAllMenu()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where parentId = 0 ORDER BY rank";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getAllMenu2()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu ORDER BY rank";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getPages($menu_id = null)
{
    if ($menu_id != null) {
        $sql = "select * from tbl_pages where menuId=$menu_id";
    } else {
        $sql = "select * from tbl_pages";
    }

    $ci = &get_instance();
    $ci->load->database();
    $query = $ci->db->query($sql);
    return $query->result();
}

function getSubMenu($parentId)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where parentId = $parentId ORDER BY rank";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getAnotherProjects($productType)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_pages where productType = $productType";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getHero()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_hero";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getSettings()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_settings where Id = 1";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getTraining()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_training where isActive = 1";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getSingleTraining($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_training where Id = $id";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getCategoryTraining($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_training where categoryId = $id";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getAllTutor()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_tutor";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllAchievements()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_achievements";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getTutor($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_tutor where Id = $id";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getSoftwareMenu()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where parentId=2";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getTrainingCategories()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_categories where isActive=1";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getTrainingCategoriesId($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_categories where Id=$id";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getTrainingWithSeo($seo_url)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_training where seo_url=$seo_url";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getComments($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_comments where trainingId=$id";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllBlog()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_blog order by isCreatedAt ASC";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getSingleCopyrights($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_copyrights where contentId=$id";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllCopyrights()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_copyrights";
    $query = $ci->db->query($sql);
    return $query->result();
}
