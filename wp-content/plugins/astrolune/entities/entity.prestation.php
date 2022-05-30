<?php

class PrestationEntity {

    public int $Id;
    public string $Title;
    public string $ImageUrl;
    public string $Description;
    public float $Price;
    public bool $Published;
    public ?int $PageId;
    public DateTime $CreatedDate;
    public DateTime $UpdatedDate;
}

?>