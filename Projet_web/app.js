let $map = document.querySelector('#map')

class GoogleMap {
    constructor () {
        this.map = null
        this.bounds = null
        this.textMarker = null
    }

    async load (element) {
        return new Promise((resolve, reject) => {
            $script('https://maps.googleapis.com/maps/api/js', () => {
                this.textMarker = class TextMarker extends google.maps.OverlayView {

                    constructor (pos, map, text) {
                        super()
                        this.div = null
                        this.html = null
                        this.pos = pos
                        this.text = text
                        this.setMap(map)
                        this.onActivation = []
                    }

                    onAdd () {
                        this.div = document.createElement('div')
                        this.div.classList.add('marker')
                        this.div.style.position = 'absolute'
                        this.div.innerHTML = this.text
                        this.getPanes().overlayImage.appendChild(this.div)
                        this.div.addEventListener('click', (e) => {
                            e.preventDefault()
                            e.stopPropagation()
                            this.activate()
                        })
                    }

                    draw () {
                        let position = this.getProjection().fromLatLngToDivPixel(this.pos)
                        this.div.style.left = position.x + "px"
                        this.div.style.top = position.y + "px"
                    }

                    onRemove () {
                        this.div.parentNode.removeChild(this.div)
                    }

                    hover () {
                        if (this.div !== null) {
                            this.div.classList.add('is-active')
                        }
                    }

                    out () {
                        if (this.div !== null) {
                            this.div.classList.remove('is-active')
                        }
                    }

                    activate () {
                        if (this.div !== null) {
                            this.div.innerHTML = this.html
                        }
                        this.onActivation.forEach(function (cb) { cb() })
                    }

                    deactivate () {
                        if (this.div !== null) {
                            this.div.innerHTML = this.text
                        }
                    }

                    setContent (html) {
                        this.html = html
                    }
                }
                this.map = new google.maps.Map(element)
                this.bounds = new google.maps.LatLngBounds()
                resolve()
            })
        })
    }

    addMarker (lat, lng, text) {
        let point = new gontoggle.maps.LatLng(lat, lng)
        let marker = new this.textMarker(point, this.map, text)
        marker.onActivation.push(() => {
            this.map.setCenter(marker.pos)
        })
        this.bounds.extend(point)
        return marker
    }

    centerMap () {
        this.map.panToBounds(this.bounds)
        this.map.fitBounds(this.bounds)
    }
}

const initMap = async function () {
    let map = new GoogleMap()
    let activeMarker = null
    let enabledMarker = null
    await map.load($map)
    Array.from(document.querySelectorAll('.item')).forEach(function (item) {
        let marker = map.addMarker(item.dataset.lat, item.dataset.lng)
        marker.setContent(item.innerHTML)
        marker.onActivation.push(function () {
            if (enabledMarker !== null) {
                enabledMarker.deactivate()
            }
            enabledMarker = marker
        })
        item.addEventListener('mouseover', function () {
            marker.hover()
            if (activeMarker !== null) {
                activeMarker.out()
            }
            activeMarker = marker
        })
        item.addEventListener('mouseleave', function () {
            if (activeMarker === marker) {
                marker.out()
                activeMarker = null
            }
        })
    })
    map.centerMap()
}

if ($map !== null) {
    initMap()
}