<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This project was built and developed by awbimasakti
 * 
 * @package OnlineShop Non-Courir
 * @author AWBimasakti <aw.bimasakti@gmail.com>
 * @author ajid2 <yusuf1bimasakti@gmail.com>
 * @copyright 2021 https://ilmuparanormal.com
 */

class Select_model extends CI_Model
{
    /**
     * Call dynamicly method (laravel like)
     *
     * @param string $name
     * @param mixed $args
     * @return __class__
     */
    public function __call($name, $args)
    {
        $arr = preg_split('/(?=[A-Z])/', $name);
        if ($arr[1] == 'With') {
            return $this->modelWith($arr[0], ...$args);
        }

        return $this->{$name}(...$args);
    }

    public function getDataKategoriPost()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_kategori');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->order_by('nm_kategori', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataTagsBerita()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_tags');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->order_by('nm_tags', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getProdukKategori()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('produk_kategori as A');
        $query = $this->db->join('tbl_kategori as B', 'A.id_kategori=B.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }

    public function getProdukTags()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('produk_tags as A');
        $query = $this->db->join('tbl_tags as B', 'A.id_tags=B.id_tags');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Find produk by id
     *
     * @param string $entity
     * @param integer $id
     * @return void
     */
    public function findById(string $entity, int $id)
    {
        return $this->db->get_where('tbl_' . $entity, ['id_' . $entity => $id])->row();
    }

    /**
     * Append relation to resource
     *
     * @param string $name
     * @param object|array $produk
     * @param array $rules
     * @return object|array
     */
    public function modelWith($name, $id, $rules, $resource = null)
    {
        if (is_null($resource)) {
            $resource = $this->findById($name, intval($id));
        }

        if (is_array($rules[0])) {
            foreach ($rules as $rule) {
                $select = $this->setSelect($rule[0], $rule[1]);
                $result = $this->hasMany($name, $rule[0], $select, $resource);
                $resource->{$rule[0]} = $result;
            }
        } else {
            $select = $this->setSelect($rules[0], $rules[1]);
            $result = $this->hasMany($name, $rules[0], $select, $resource);
            $resource->{$rules[0]} = $result;
        }

        return $resource;
    }

    /**
     * Set selected column from array
     *
     * @param string $name
     * @param array $selects
     * @return string
     */
    private function setSelect(string $name, array $selects): string
    {
        $select = null;
        foreach ($selects as $s) {
            $select .= 'tbl_' . $name . '.' . $s . (next($selects) ? ',' : '');
        }

        return $select;
    }

    /**
     * Many to many relationship
     *
     * @param string $entity
     * @param string $relation
     * @param string $select
     * @param object $produk
     * @return object|boolean
     */
    private function hasMany($entity, $relation, $select, $produk)
    {
        $table = 'tbl_' . $entity;
        $pivot = $entity . '_' . $relation;
        $relat = 'tbl_' . $relation;
        $key   = 'id_' . $entity;
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($pivot, $table . '.id_' . $entity . ' = ' . $pivot . '.id_' . $entity, 'left');
        $this->db->join($relat, $relat . '.id_' . $relation . ' = ' . $entity . '_' . $relation . '.id_' . $relation, 'left');
        $this->db->where($table . '.id_' . $entity, $produk->{$key});
        $this->db->where($table . '.status', 'PUBLISH');
        $result = $this->db->get();

        return $result->result();
    }
}
