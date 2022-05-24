# Components

This theme ships some components (as twig macros) that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Timeline

Timeline has been implemented to simplify the use of the Tabler Timeline component.

### Parameters
`timeline()` macro, waits for 2 parameters:

| Parameter | Description                    |   Type    | Default |
|:---------:|:-------------------------------|:---------:|:-------:|
|   items   | Array of [Item](#Item)         |  `array`  |  `[]`   |
|  values   | [Values](#Item) object         | `object`  |  `{}`   |

#### Item
| Parameter | Description                                                               |   Type    |  Default  |
|:---------:|---------------------------------------------------------------------------|:---------:|:---------:|
|   icon    | Tabler icon name                                                          | `string`  |  `null`   |
| iconColor | Color of the icon background                                              | `string`  |  `null`   |
|   time    | Time to display                                                           | `string`  |  `null`   |
|   title   | Title of the item                                                         | `string`  |  `null`   |
|   text    | Text of the item, override `textHtml`                                     | `string`  |  `null`   |
| textHtml  | If `text` is not defined, allows to put RAW HTML into item text container | `string`  |  `null`   |

#### Values
| Parameter | Description                          |   Type    | Default |
|:---------:|--------------------------------------|:---------:|:-------:|
|  simple   | Set if simple timeline is used       | `boolean` | `false` |                                        
### Usage

```twig
{% from '@Tabler/components/timeline.html.twig' import timeline %}

{{ timeline([
    { icon: 'user',     iconColor: 'warning',   time: '10 hours ago',   title: 'Users',         text:'User was created' },
    { icon: 'delete',   iconColor: 'danger',    time: '12 hours ago',   title: 'Item deleted',  text:'An item has been deleted.' },

    {
        icon: 'users',
        time: '13 hours ago',
        title: '+3 Friend Requests',
        textHtml:
        '<div class="avatar-list mt-3">
          <span class="avatar">
            <span class="badge bg-success"></span>FC</span>
          <span class="avatar">
            <span class="badge bg-success"></span>JL</span>
          <span class="avatar">
            <span class="badge bg-success"></span>LL</span>
        </div>'
    },

    { icon: 'plus',     iconColor: 'success',   time: '1 day ago',      title: 'Item created',  text:'Element has been created.' },
    { icon: 'plus', time: '1 day ago', title: 'Item created'},
    { icon: 'plus', time: '1 day ago'},
    { icon: 'plus'},

    { icon: 'plus', time: '2 days ago', title: 'Item created', text: 'Element has been created.' },
    { time: '2 days ago', title: 'Item created', text: 'Element has been created.' },
    { title: 'Item created', text: 'Element has been created.' },
    { text: 'Element has been created.' },
]) }}
```
### Preview

| Parameter |         |        |
|:---------:|:-------:|:------:|
|  simple   | `false` | `true` |  
|           | ![image](https://user-images.githubusercontent.com/25293190/169993117-200f77e8-fa05-4ffc-8eb2-a9b2b412f5e2.png) | ![image](https://user-images.githubusercontent.com/25293190/169993433-81d8bbb9-c1ef-452e-8fb4-cf2386e91664.png) |  


## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
