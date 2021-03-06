<?hh

enum E: string {
  A = 'foo';
  B = 'bar';
}

type Tshape = shape(
  E::A => int,
  ?E::B => int,
);

function is_shape(mixed $x): void {
  if ($x is Tshape) {
    echo "shape\n";
  } else {
    echo "not shape\n";
  }
}

is_shape(shape());
echo "\n";
is_shape(shape(E::A => 1));
is_shape(shape(E::A => 1, E::B => 1));
is_shape(shape(E::A => true));
is_shape(shape(E::A => 1, E::B => true));
echo "\n";
is_shape(shape('foo' => 1));
is_shape(shape('foo' => 1, 'bar' => 1));
is_shape(shape('foo' => true));
is_shape(shape('foo' => 1, 'bar' => true));
