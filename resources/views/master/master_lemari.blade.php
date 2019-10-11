<!DOCTYPE html>
<html lang="en">
<head>
    <title>three.js webgl - geometry - cube</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <style>
        body {
            font-family: Monospace;
            background-color: #f0f0f0;
            margin: 0px;
            overflow: hidden;
        }
    </style>
</head>
<body>
{{--
@foreach($cari as $c)
    {{$c->dus_id}} <br>
    {{$c->nama_pt}} <br>
@endforeach--}}

<script src="{{asset('js/three/three.js')}}"></script>
<script src="{{asset('js/three/three.min.js')}}"></script>
<script src="{{asset('js/three/three.module.js')}}"></script>
<script src="{{asset('js/three/stats.min.js')}}"></script>
<script src="{{asset('js/three/GLTFLoader.js')}}"></script>

<script>
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    /*var geometry = new THREE.BoxGeometry( 1, 1, 1 );

    var material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
    var cube = new THREE.Mesh( geometry, material );
    scene.add( cube );
    camera.position.set(0,0,100);*/

    var loader = new THREE.GLTFLoader();

    loader.load( '{{asset('3d/OutlinedBox.gltf')}}', function ( gltf ) {

        scene.add( gltf.scene );

    }, undefined, function ( error ) {

        console.error( error );

    } );

    /*renderer.render(scene,camera, gltf.scene);*/
</script>

</body>
</html>
