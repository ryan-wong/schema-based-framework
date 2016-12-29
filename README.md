# schema-based-framework
The idea of this framework is to create abstraction layers to ease API development.

## steps
1. API Handler receives payload
2. Schema is retrieved
3. Payload and Schema is used to validate payload
4. Once validated, perform whatever business logic you want on it
5. Run the object through a serializer which formats the data in a way you can save it on the server
6. Service will save the object however you want to do it
7. Once saved, run the serializer to deserialize what you retrieve from database to be return to API

## Advantages of doing this
1. Your validation is not binded to an ORM so what you get from API doesn't necessary need to be what you store
2. You can take what your given from API and split them into smaller objects which correspond to different tables
3. You simplify the code in the API handler by having a validation done in schema and serializer to transform it.
4. No need to validate stuff so late when you want to save something.
5. Not tie down to a framework.
