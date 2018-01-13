FORMAT: 1A

# Nezaker API

# Content

## Show all stages [GET /stages]
Get a JSON representation of all the active stages.

+ Response 200 (application/json)
    + Body

            {
                "id": 10,
                "name": "foo"
            }

## Show all grades [GET /grades/{stageId}]
Get a JSON representation of all the active grades.

+ Response 200 (application/json)
    + Body

            {
                "id": 10,
                "name": "foo"
            }

## Show all subjects [GET /subjects/{gradeId}]
Get a JSON representation of all the active subjects.

+ Response 200 (application/json)
    + Body

            {
                "id": 10,
                "name": "foo"
            }

## Show all lessons [GET /lessons/{subjectId}]
Get a JSON representation of all the active lessons.

+ Response 200 (application/json)
    + Body

            {
                "id": 10,
                "name": "foo"
            }

## Show all videos [GET /videos/{lessonId}]
Get a JSON representation of all the active videos.

+ Response 200 (application/json)
    + Body

            {
                "id": 10,
                "lessonName": "foo",
                "youtubeVideoId": "RbaW-WTsVTk",
                "author": {
                    "name": "Islam Ibrahim"
                },
                "status": "Approved"
            }