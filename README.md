## kolesa-upgrade-homework-1

### Prerequisite

Install [docker-compose](https://docs.docker.com/compose/install/)

### Details

1. Class `Advert` --> represents the abstract representation of object advertisement. It has two child classes such as `RentAdvert` and `SaleAdvert` which are objects with specific category. As the project grow, we can easily add new categories.

2. Interface `ObjectToAdvert` --> it as anything (that can be advertised) that implements `getProportyMsg()`. The main reason for implmentation of this interface is that we can further scale up our catolog by adding new classes that can be thought as object to advert. (Note: now we have only class `Home` and `Apartment`)

3. Utility classes `PriceTag` and `PeriodTag` --> enables the elasticty in modifiying the price and period parts of title.

4. Lastly class `Distributor` --> distributes elements in given array based on the category and on the type of advert object.

### Run

The main logic can be found in the `./src/public/index.php`. In order to run and test go to `docker` repository and run:

```bash
docker-compose up
```

The local server will be running on the address of `localhost:8000`
