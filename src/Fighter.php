<?php

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;

    private int $strength;
    private int $dexterity;
    private string $image;
    private int $life = self::MAX_LIFE;
    private ?Weapon $weapon = null;
    private ?Shield $shield =null;

    
    public function __construct(
        string $name,
        int $strength = 10,
        int $dexterity = 5,
        string $image = 'fighter.svg'
    ) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->image = $image;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }



    public function fight(Fighter $adversary): void
    {
        $damage =  rand(1,$this->getDamage()) - $this->getDefense($adversary);
        if ($damage < 0) {
            $damage = 0;
        }
        $adversary->setLife($adversary->getLife() - $damage);
    }


    /**
     * Get the value of life
     */
    public function getLife():int
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @param $life
     * @return Fighter|int
     */
    public function setLife($life)
    {
        if($life < 0) {
            $life = 0;
        }
        $this->life = $life;

        return $this;
    }

    public function isAlive(): bool
    {
        return $this->getLife() > 0;
    }

    /**
     * Get the value of strength
     */
    public function getStrength(): int
    {
        return $this->strength;
    }


    /**
     * Set the value of strength
     *
     * @param $strength
     * @return Fighter|int
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get the value of dexterity
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * Set the value of dexterity
     *
     * @param $dexterity
     * @return Fighter|int
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;

        return $this;
    }


    public function getWeapon(): ?Weapon
    {
       return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function getDamage(): int
    {
        if($this->getWeapon()){
            return $this->getStrength() + $this->getWeapon()->getDamage();
        }
        return rand(1, $this->getStrength());
    }



    public function getDefense(): int
    {
        // recuperer si il ya un bouclier
        if($this->getShield()){
            //calcule dexterité +
            return  $this->getDexterity() + $this->getShield()->getDefense();
        }
        return $this->getDexterity();
    }

    /**
     * @return Shield|null
     */
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * @param Shield|null $shield
     */
    public function setShield(?Shield $shield): void
    {
        $this->shield = $shield;
    }


}
