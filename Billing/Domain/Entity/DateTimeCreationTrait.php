<?php
namespace Billing\Domain\Entity;


trait DateTimeCreationTrait
{
    /**
	 * @Column(type="datetime")
	 */
    protected $created_at;

	/**
	 * @Column(type="datetime", nullable=true)
	 */
    protected $updated_at;
    
    public function getCreatedAt()
	{
		return $this->created_at;
	}

	public function setCreatedAt()
	{
		$this->created_at = new \DateTime('now');

		return $this;
	}

	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	public function setUpdatedAt()
	{
		$this->updated_at = new \DateTime('now');

		return $this;
	}
}