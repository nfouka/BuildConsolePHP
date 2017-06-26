<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cli;

/**
 * Description of newPHPClass
 *
 * @author nadir.fouka@imag.fr
 */

class QueryBuilder {
    

    private $fn ; 
    private $tn ; 
    private $local ; 
    private $fc ; 
    private $tc ; 
    private $cur ; 
    private $limit ; 
    private $format ; 
    
    private $hb ; 
    private $he ; 
    private $photo ; 
    private $seats ; 
    private $order ; 
    private $radius ; 
    private $sort ; 
    private $page ; 
    
    function __construct($fn, $tn, $local, $fc, $tc, $cur, $limit, $format, $hb, $he, $photo, $seats, $order, $radius, $sort, $page) {
        $this->fn = $fn;
        $this->tn = $tn;
        $this->local = $local;
        $this->fc = $fc;
        $this->tc = $tc;
        $this->cur = $cur;
        $this->limit = $limit;
        $this->format = $format;
        $this->hb = $hb;
        $this->he = $he;
        $this->photo = $photo;
        $this->seats = $seats;
        $this->order = $order;
        $this->radius = $radius;
        $this->sort = $sort;
        $this->page = $page;
    }
    static function getKey() {
        return self::$key;
    }

    function getHb() {
        return $this->hb;
    }

    function getHe() {
        return $this->he;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getSeats() {
        return $this->seats;
    }

    function getOrder() {
        return $this->order;
    }

    function getRadius() {
        return $this->radius;
    }

    function getSort() {
        return $this->sort;
    }

    function getPage() {
        return $this->page;
    }

    static function setKey($key) {
        self::$key = $key;
    }

    function setHb($hb) {
        $this->hb = $hb;
    }

    function setHe($he) {
        $this->he = $he;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setSeats($seats) {
        $this->seats = $seats;
    }

    function setOrder($order) {
        $this->order = $order;
    }

    function setRadius($radius) {
        $this->radius = $radius;
    }

    function setSort($sort) {
        $this->sort = $sort;
    }

    function setPage($page) {
        $this->page = $page;
    }

        


    function getFn() {
        return $this->fn;
    }

    function getTn() {
        return $this->tn;
    }

    function getLocal() {
        return $this->local;
    }

    function getFc() {
        return $this->fc;
    }

    function getTc() {
        return $this->tc;
    }

    function getCur() {
        return $this->cur;
    }

    function getLimit() {
        return $this->limit;
    }

    function getFormat() {
        return $this->format;
    }

    function setFn($fn) {
        $this->fn = $fn;
    }

    function setTn($tn) {
        $this->tn = $tn;
    }

    function setLocal($local) {
        $this->local = $local;
    }

    function setFc($fc) {
        $this->fc = $fc;
    }

    function setTc($tc) {
        $this->tc = $tc;
    }

    function setCur($cur) {
        $this->cur = $cur;
    }

    function setLimit($limit) {
        $this->limit = $limit;
    }

    function setFormat($format) {
        $this->format = $format;
    }


    public function executeQuery() {
        
        $url = "https://public-api.blablacar.com/api/v2/trips?fn="
                .$this->getFn()."&tn=".$this->getTn()."&locale=".$this->getLocal()
                ."&fc=".$this->getFc()."&tc=".$this->getTc()
                ."&cur=".$this->getCur()."&limit=".$this->limit
                ."&hb=".$this->getHb()."&he=".$this->getHe()
                ."&photo=".$this->getPhoto()."&order=".$this->getOrder()
                ."&seats=".$this->getSeats()."&radius=".$this->getRadius()
                ."&sort=".$this->getSort()."&page=".$this->getPage()
                ."&_format=".$this->getFormat(); 
        return $url ; 
    }
    
}
