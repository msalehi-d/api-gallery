Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
## Endpoints

**Get all images**

`GET /wallpaper/wallpapers`

Output:
```
{
  "success": true,
  "data": {
    "wallpapers": [
      {
        "id": 1,
        "url": "https://picsum.photos/id/995/600/500",
        "title": "non minus",
        "tags": [
          {
            "id": 1,
            "title": "طبیعت",
            "slug": "nature",
            "created_at": null,
            "updated_at": null,
            "pivot": {
              "wallpaper_id": 1,
              "tag_id": 1
            }
          },
          {
            "id": 2,
            "title": "آیفون",
            "slug": "iphone",
            "created_at": null,
            "updated_at": null,
            "pivot": {
              "wallpaper_id": 1,
              "tag_id": 2
            }
          },
          {
            "id": 3,
            "title": "کهکشان",
            "slug": "galaxy",
            "created_at": null,
            "updated_at": null,
            "pivot": {
              "wallpaper_id": 1,
              "tag_id": 3
            }
          }
        ],
        "likes": 2,
        "created_at": "2022-01-20",
        "updated_at": "2022-01-20"
      },
      {
        "id": 2,
        "url": "https://picsum.photos/id/354/600/700",
        "title": "quia omnis",
        "tags": [
          {
            "id": 1,
            "title": "طبیعت",
            "slug": "nature",
            "created_at": null,
            "updated_at": null,
            "pivot": {
              "wallpaper_id": 2,
              "tag_id": 1
            }
          }
        ],
        "likes": 0,
        "created_at": "2022-01-20",
        "updated_at": "2022-01-20"
      }
    ],
    "pagination": {
      "next": "http://localhost:8000/wallpaper/wallpapers?page=2",
      "prev": null,
      "per_page": 2,
      "has_more": true
    }
  },
  "message": "Wallpapers fetched."
}
```
---

**Get a single image by id**

`GET /wallpaper/wallpapers/{id}`

Output:
```{
  "success": true,
  "data": {
    "id": 1,
    "url": "https://picsum.photos/id/995/600/500",
    "title": "non minus",
    "tags": [
      {
        "id": 1,
        "title": "طبیعت",
        "slug": "nature",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 1,
          "tag_id": 1
        }
      },
      {
        "id": 2,
        "title": "آیفون",
        "slug": "iphone",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 1,
          "tag_id": 2
        }
      },
      {
        "id": 3,
        "title": "کهکشان",
        "slug": "galaxy",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 1,
          "tag_id": 3
        }
      }
    ],
    "likes": 2,
    "created_at": "2022-01-20",
    "updated_at": "2022-01-20"
  },
  "message": "Wallpaper fetched."
}
```
---

**Get All images with specific tag**

`GET /wallpaper/wallpapers/tag/{slug}`

Output is same as `/wallpaper/wallpapers` with requested tag

---
**Get all tags**

`GET /wallpaper/tags`

Output:
```
[
  {
    "id": 1,
    "slug": "nature",
    "title": "طبیعت",
    "image": "https://picsum.photos/id/1043/400/500"
  },
  {
    "id": 2,
    "slug": "iphone",
    "title": "آیفون",
    "image": "https://picsum.photos/id/719/700/700"
  },
  {
    "id": 3,
    "slug": "galaxy",
    "title": "کهکشان",
    "image": "https://picsum.photos/id/988/400/400"
  }
]
```
---
**Login and get API token**


`POST /login`  
Output:
```
{
  "success": true,
  "data": {
    "token": "1|hkJQ8NaCXGLtS13G6LhVK5BvtJKxZI4Sz07h3ogK",
    "name": "admin"
  },
  "message": "User signed in"
}
```
---
**All CRUD actions must have Authorization Header Using Bearer Token**
 
Exapmle:<br> `Authorization: Bearer 1|PnZaOacPyHjjOA7eOcSJT33VxJuvUo8TGVBnW186`

---

**Create a new image/wallpaper**

`POST  /wallpaper/wallpapers`

Params:

- `title` image title
- `url` image full URL
- `likes` number of liker
- `tags[]` (as array) each wallpaper/image can have multiple tags 

After successful image creation, system will return created Item.
```
{
  "success": true,
  "data": {
    "id": 52,
    "url": "https://via.placeholder.coem/500x500.png?text=repudiandae%20w",
    "title": "yes",
    "tags": [
      {
        "id": 1,
        "title": "طبیعت",
        "slug": "nature",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 52,
          "tag_id": 1
        }
      },
      {
        "id": 2,
        "title": "آیفون",
        "slug": "iphone",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 52,
          "tag_id": 2
        }
      }
    ],
    "likes": null,
    "created_at": "2022-01-23",
    "updated_at": "2022-01-23"
  },
  "message": "Wallpaper created."
}
```

**Update a wallpaper**

`POST http://localhost:8000/wallpaper/wallpapers/{id}`

Params:

- `title` image new title
- `url` image new full URL
- `likes` number of liker
- `tags[]` (as array) each wallpaper/image can have multiple tags 
- `_method` MUST equals to 'PATCH'update readme.md


After successful image update, system will return created Item.
```
{
  "success": true,
  "data": {
    "id": 52,
    "url": "https://via.placeholder.coem/500x500.png?text=repudiandae%20w",
    "title": "yes",
    "tags": [
      {
        "id": 1,
        "title": "طبیعت",
        "slug": "nature",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 52,
          "tag_id": 1
        }
      },
      {
        "id": 2,
        "title": "آیفون",
        "slug": "iphone",
        "created_at": null,
        "updated_at": null,
        "pivot": {
          "wallpaper_id": 52,
          "tag_id": 2
        }
      }
    ],
    "likes": 0,
    "created_at": "2022-01-23",
    "updated_at": "2022-01-23"
  },
  "message": "Wallpaper updated."
}
```