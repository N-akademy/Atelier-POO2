<?php

class Shield
{
    private string  $image= 'shield.svg';
    private int $protection = 10;



    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }


    /**
     * @return int
     */
    public function getDefense(): int
    {
        return $this->protection;
    }

    /**
     * @param int $protection
     */
    public function setDefense(int $protection): void
    {
        $this->protection = $protection;
    }


}