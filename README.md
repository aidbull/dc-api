# dc-api
Debit Card API for Fayrix.

## Endpoints
Cards:
| method  | route  | desc |
| :------------: |:---------------| :-----|
| [GET]      | /cards/:id | get the card info |
| [GET]      | /cards/:id/balance        |   gets the balance of the card |
| [GET] | /cards/:id/pin         |   gets the pin code of the card |
| [GET] | /cards/:id/history        |    get a list of transaction history, expects a timeframe (end & start dates) |
| [POST] | /cards/create        |    creates a new debit card |
| [POST] | /cards/:id/deactivate        |   deactivates a card |
| [POST] | /cards/:id/activate        |    activates a card |
| [POST] | /cards/:id/update        |    updates the card info |
| [POST] | /cards/:id/updatePin        |   updates the pin of the card |
| [POST] | /cards/:id/load        |    loads card with a balance, expects to get the amount to load as a parameter |

Countries:
| method  | route  | desc |
| :------------: |:---------------| :-----|
| [GET]      | /countries | a list of the available countries |
| [GET]      | /countries/:id | get a specific country |

## API-client services
- CardService's methods:
   - get(int $cardId): CardDTO
   - balance(int $cardId): float|null
   - pin(int $cardId): int|null
   - history(int $cardId, DateTime $startDate, DateTime $endDate)
   - create(CardDTO $cardData): CardDTO|null
   - activate(int $cardId)
   - deactivate(int $cardId)
   - update(int $cardId, CardDTO $cardData)
   - updatePin(int $cardId, int $cardPin)
   - load(int $cardId, int $amount)
 
- CountryService's methods:
   - __invoke(): CountryDTO[]
   - get(int $countryId): CountryDTO|null
 
## Installation
