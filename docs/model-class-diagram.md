# Crime Vault Model Class Diagram

This UML class diagram documents the application's Eloquent model layer. Controllers and views are not shown because this diagram is based on the models and their declared relationships.

![Visual map of Crime Vault model connections](model-connections.svg)

The SVG is available on its own at [model-connections.svg](model-connections.svg).

```mermaid
classDiagram
    class EloquentModel {
        <<Laravel>>
    }
    class Authenticatable {
        <<Laravel>>
    }

    class User {
        +string name
        +string email
        +string role
        +favourites()
        +discussions()
        +isAdmin() bool
    }
    class SerialKiller {
        +string name
        +string nickname
        +array ages
        +string country
        +array victim_count
        +string description
        +string image
        +victimRecord()
        +favourites()
        +discussions()
        +events()
        +getAgeTextAttribute() string
    }
    class Victim {
        +int killer_id
        +array count
        +killer()
    }
    class UnsolvedCase {
        +string name
        +string country
        +array count
        +array suspects
        +string description
        +string image
        +favourites()
        +discussions()
        +events()
    }
    class Resource {
        +string resource_type
        +string title
        +string url
        +string description
    }
    class Favourite {
        +int user_id
        +int favouritable_id
        +string favouritable_type
        +user()
        +favouritable()
    }
    class Discussion {
        +int user_id
        +int discussable_id
        +string discussable_type
        +string content
        +user()
        +discussable()
    }
    class CaseEvent {
        +int eventable_id
        +string eventable_type
        +string title
        +string event_type
        +date event_date
        +string location
        +decimal latitude
        +decimal longitude
        +string description
        +eventable()
    }

    EloquentModel <|-- SerialKiller
    EloquentModel <|-- Victim
    EloquentModel <|-- UnsolvedCase
    EloquentModel <|-- Resource
    EloquentModel <|-- Favourite
    EloquentModel <|-- Discussion
    EloquentModel <|-- CaseEvent
    EloquentModel <|-- Authenticatable
    Authenticatable <|-- User

    SerialKiller "1" -- "0..1" Victim : victimRecord / killer
    User "1" -- "0..*" Favourite : favourites / user
    User "1" -- "0..*" Discussion : discussions / user
    SerialKiller "1" -- "0..*" Favourite : polymorphic favouritable
    UnsolvedCase "1" -- "0..*" Favourite : polymorphic favouritable
    SerialKiller "1" -- "0..*" Discussion : polymorphic discussable
    UnsolvedCase "1" -- "0..*" Discussion : polymorphic discussable
    SerialKiller "1" -- "0..*" CaseEvent : polymorphic events
    UnsolvedCase "1" -- "0..*" CaseEvent : polymorphic events
```

## Relationship details

- `SerialKiller::victimRecord()` is a `hasOne` relationship and `Victim::killer()` is its inverse `belongsTo`. The foreign key is `victims.killer_id`. The migration does not make this column unique, so the one-to-one shape is enforced by the Eloquent relationship convention rather than by a database uniqueness constraint.
- `Favourite` and `Discussion` each belong to a `User`; the user has many of each.
- `Favourite::favouritable()`, `Discussion::discussable()`, and `CaseEvent::eventable()` are polymorphic `morphTo` relationships. Their corresponding model `morphMany` relationships are declared on `SerialKiller` and `UnsolvedCase`. The polymorphic type/id pairs identify the owner and are not ordinary foreign keys to either target table.
- `Resource` has no Eloquent relationships declared in its model.
- `User` extends Laravel's `Authenticatable`, which itself extends Laravel's Eloquent `Model`. The other application models extend Eloquent `Model` directly.