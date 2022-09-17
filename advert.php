<?php
include 'additions.php';

	interface Containerable{
		public function conteinerize():array;
	}


	abstract class AbstractAdvert{
		protected Category $category;
		protected int $price;
		protected Period $period;

		

		abstract protected function getTitle():string;

		function __construct(Category $category=null, int $price=null, Period $period=null){
			$this->setCategory($category);
			$this->setPrice($price);
			$this->setPeriod($period);
		}

		/**
		 * Get the value of category
		 *
		 * @return Category
		 */
		public function getCategory(): Category
		{
				return $this->category;
		}

		/**
		 * Set the value of category
		 *
		 * @param Category $category
		 *
		 * @return self
		 */
		public function setCategory(Category $category): self
		{
				$this->category = $category;

				return $this;
		}

		/**
		 * Get the value of price
		 *
		 * @return int
		 */
		public function getPrice(): int
		{
				return $this->price;
		}

		/**
		 * Set the value of price
		 *
		 * @param int $price
		 *
		 * @return self
		 */
		public function setPrice(int $price): self
		{
				$this->price = $price;

				return $this;
		}

		/**
		 * Get the value of period
		 *
		 * @return Period
		 */
		public function getPeriod(): Period
		{
				return $this->period;
		}

		/**
		 * Set the value of period
		 *
		 * @param Period $period
		 *
		 * @return self
		 */
		public function setPeriod(Period $period): self
		{
				$this->period = $period;

				return $this;
		}
	}


	class EstateAdvert extends AbstractAdvert implements Containerable
	{
		private int $rooms;
		private Type $type;
		
		function __construct(int $rooms=null, Category $category=null, int $price=null, Type $type=null, Period $period=null)
		{
			parent::__construct(category: $category, price: $price, period: $period);
			$this->setRooms($rooms);
			$this->setType($type);
		}

		function getTitle():string{
			return "";
		}

		function conteinerize(): array
		{
			return [
				'rooms' => $this->getRooms(),
				'category' => $this->getCategory(),
				'price' => $this->getPrice(),
				'type' => $this->getType(),
				'period' => $this->getPeriod()
			];
		}

		/**
		 * Get the value of type
		 *
		 * @return Type
		 */
		public function getType(): Type
		{
				return $this->type;
		}

		/**
		 * Set the value of type
		 *
		 * @param Type $type
		 *
		 * @return self
		 */
		public function setType(Type $type): self
		{
				$this->type = $type;

				return $this;
		}

		/**
		 * Get the value of rooms
		 *
		 * @return int
		 */
		public function getRooms(): int
		{
				return $this->rooms;
		}

		/**
		 * Set the value of rooms
		 *
		 * @param int $rooms
		 *
		 * @return self
		 */
		public function setRooms(int $rooms): self
		{
				$this->rooms = $rooms;

				return $this;
		}
	}


?>