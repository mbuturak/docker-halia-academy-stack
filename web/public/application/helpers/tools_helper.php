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

function getSoftwareMenu()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where parentId=2";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getHardwareMenu()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where parentId=3";
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

function getMegaMenu()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where megaMenu=1 order by rank";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllFeatures()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_features order by rank ASC";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllKeywords()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_keywords";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getMenuInformation($Id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where Id=$Id";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getMenuInformationWithSeoUrl($seo_url)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where seo_url='$seo_url'";
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

function getProcess($pages_id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_process where pages_id = $pages_id and isActive = 1 order by rank";
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

function getContactFormInformationMenu($parentId)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_menu where parentId = $parentId and isActive = 1";
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

function getProductsByMenuId($menu_id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_product where menuId = $menu_id";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getProcessByPagesId($pages_id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_process where pages_id = $pages_id order by rank ASC";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getFeaturesWithProductType($productType)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_features where productType='$productType'";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getFeaturesById($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_features where Id='$id'";
    $query = $ci->db->query($sql);
    return $query->result();
}


function getFeaturesBySeoUrl($url)
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_features where url='$url'";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllComments()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_comments";
    $query = $ci->db->query($sql);
    return $query->result();
}

function getAllPartners()
{
    $ci = &get_instance();
    $ci->load->database();
    $sql = "select * from tbl_partners";
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

