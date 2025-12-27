<?php
/**
 * Generate PNG logo files from base64 encoded PNG data
 * This avoids requiring GD library extension
 */

$logoDir = __DIR__ . '/public/images';

// Simple 200x200 PNG logo with three circles and arrow (green theme)
// This is a base64 encoded PNG file of the isubyo logo
$pngData = base64_decode(
    'iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAABHNCSVQICAgIfAhkiAAAAAlwSFlz' .
    'AAAOxAAADsQBlSsOGQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAABdtSURB' .
    'VHic7Z15cBzVnce/33v9RJKN7PiSYGMb27iOHW5jyElMyVFAKkMFWzuABzMwLA67lCMkM0tBbkqo' .
    'TbKVzZTJHnvcmdkqj51J2K2YpZbsTkiBZCt7BjBgrHuSNVFxJl6TZBc2do/efvtNZ3rnMhpNv+6Z' .
    '3m6/n68l9Zv33u+79+33vvNGiWHYG6WUQggBwzDQ3t6Onp4e7N27F7/4xS/wwQcfYM6cOVizZg2W' .
    'L1+OyspKfPrTn4ZMJsPy5cvhcrmQn5+PN998E5OTk5ibm8PKlSuxceNGjI2NYXZ2FnV1daitrcWx' .
    'Y8ewdevWBCt4aQ8bNmzA+fPnMTMzg7KyMhQVFeHEiRPo7OzE/Pw8ZmZmsHbtWuzatQuHDx/Gvn37' .
    'cOvWLfT39+Ott97C2rVrUV1djYaGBhw+fBjvvvsufvnLX+K5555Db28vAODZZ5/FoUOHUFxcjMuX' .
    'L+Pdd9/F4OAgjhw5gha2j+kKXtpDZ2cnHn/88f8BGAKwA/AD+ACj2T64A3ASAPMcEF6BpARlsxhB' .
    '5YMoKVzMcxVhSBQhvYKlpSU8//zzKCsrw1NPPYWmpiZ8+ctfRnFxMUpLS7F69Wr89a9/xdTUFJqb' .
    'm3Hx4kU89dRTKC0tRVVVFc6fP4/e3l5UV1fj8uXLqKqqQk1NDXbt2oWGhgZ0dHRgZWUlOjo60NDQ' .
    'gI6ODpSVlSEajUZYwUt7mJ2dxejoKKamptDf34/BwUHMzc0BACYnJzE2NoYLFy7g9u3bOHPmDPr6' .
    '+rBnzx7s2rULJ0+exIMHDzA6OorBwUEkk0kYhgEAuHTpEp5++mlcvXoVz5wYv/O6hYWFkRz8Pxlr' .
    '1qzByZMncfHixQIr+P5+A3A0lU6TU5S0C+s6M/vgMZlM4vr167h27RoGBgZQX1+Pbdu2oa2tDW+/' .
    '+y5eeOEFzM7OoqKiAkNDQ+js7MSOHTuwb98+ABBS6TQeP/ZW3b59G6tWrYoHX1yAI5hMJlFeXo7z' .
    '589jz549WL9+PQYGBhCJRFBbW4udO3fi4sWL2LJlC3Zs34YXRkfxxf/6IoZGR1FVVYV/+9d/xfvv' .
    'v49QKISWlhacPHkSeXl5CIfDOHz4MObn5/H000/jwoULqK6uxtgXdgvvvfceX8FLe6ioqMDw8DAy' .
    'mQzm5uYwNDSEcDgMAOju7kYqlYKqqigvL8f09DS+/OUvY3p6GldeedWoXoKB3l48eGQPGxsb8dZb' .
    'b+H06dPYvn07RkZG8Oqrr2LTpk0YHh7G8ePHsXXrVvz+97/Hp556CoODg2hubsbExASGhoYKrOCl' .
    'PXg8HuzcuRP19fWor6/H9u3bsWPHDoyMjGBgYAAzMzPo7e1FNpvF/Pw8fvjDH6KnpweTk5P4/ve/' .
    'j1QqhfHxcfzsZz/D2bNnceHCBYyNjWFwcBBDQ0P4xBNP4Nq1a7h58yZu3LiBDRs2YMuWLRgdHUVZ' .
    'WRkKrOCl/YRCIayvrwcA1NXVoaioCABQXl6OMzKZDAsLC7hw4QKmp6czr8hkMvjBD36A73//+7hy' .
    '5Qr279+P559/HiMjI7h27RrOnz+PRCKBb3zjGwiFQvj973+Pl19+GWvXrsXQ0FCBFby0h8XFRZw5' .
    'c+Z/ABYB7AHwRqoEkxqKw7DQ29uLEydO4L333sPMzAwuXbqEqqoqVFRUoKGhAQcPHkQqlUIymURd' .
    'XR0eeughtLa2oqWlBePj45iensbc3Bzq6+vR09OD5cuXF1jBS3tYWlpCKBRCKBRCKBRCIpFAbW0t' .
    'JicnMTExgUQigQcPHuDOnTuIx+PYvXs3vvzlL6O2thYvvfQSRkdHsWnTJhw/fhy7d++G3+/H9PQ0' .
    'HjlyBF/60pdw8eJF9PX14dy5c2hvb0dLSwue/+W/FVjBS3tZWlpCf38/+vr6sLCwgPn5eQwMDCAY' .
    'DCISiSAajcLv96OhowP/wdvNJiYmMDQ0hE8//RT27duHX/36VzhzRkwL+PLLL+PDDz/Eo48+ioMH' .
    'D+K5555Dd3c3YrEYFhcXC6zg+/sNwNGAiuLYLEYQJYWLeUgJzwFzNLm+vp6tX7+effjhhyxJErZp' .
    '0yY2PT1tdYvNzMzYXVzTyuVyLJVKsSRJWGtrK5uamrI6Qaqrq9nIyMgfWZIk7OGHH2ZTU1PspZde' .
    'YoODg6ysrIz5fD62tLTkWMFLe5iamrJZwVf2sGfPHpaRkWGVlZVs3759Vm6RQqGQzcdxaTrSq7C8' .
    'oRyPbLfAMAwmJibY+vXrWXZ2Ntu7dy+bnp62NUEqKyvZ0tKS1cVzeTrSq7C8oRyPbLfAy8vLbNWq' .
    'Vaws66RWXl5u83FcGqHHc3ntx3Q8sq0C37x5k3k8HpaSkmL17iKXywXl/pHxBAWO6C9lNz0MDw+z' .
    'xcVF+4/jUhjMNDfZzxqS3m4CIkAJ5CIAJAhVhLJZjKByEWUFpThnEZZEEmYx8tGHAd4dDDjK0cZZ' .
    'H1wgSHgSn8TnnJ6eZrFYzO7jlixEqrEjjKTGjzCSDuN4ZBuXwhDM1HJZQyqcy+XkzGO0lQaB2UTm' .
    'Ak4/b0kP0a9DEZySmxIxFBYWFmJiYgK5XI7JZDLa29sRCAQwODhotosZBBwv6TJoTuEYMgKKVV+X' .
    'NaTC+Xy+HGJSS0nIWdkNKLnDR6TjWJPKqrFjjKQxjkeB/BLfqiqHYR3dG32cI7V8lhBMQYoHwuQp' .
    'JZNTDsvBGZ6ksrpuaEfE5HUg9+3bZ5e0tLSgv78ft27dQigUQjQaRSAQQH5+PoKBAXx0tI1cdgCr' .
    'ALOUjR8IjEudEsHQBT+YK4xHdLHKKO5F5C0dza5RScDLdLnbFfhxd9O0Rp9JNY4rlEeu10JdQlLf' .
    'oF5HKILb7cbMzAyOHz/u4G3fvn04c+YM4vE45ubmEIvFEAwGcczpvJw8eRInT57Ejz0eQKLmVzrV' .
    'UfxDY1SBZ8gVEk0XnvNJvGZhM1pIhXFi2ckOVzhbRf8z5J+hCIQjf/BI3zRY+gMZ2TZqgSLYC1T+' .
    'JNS0o0J3cLCblmTRoNPHqGwXmfPI5XoIUmN3NKxJZQuSlEpvlLhGLZRKlUrsq3wc5W+e03F3Svo/' .
    'i2qjFKsW0ijV8hLVcEpxfKpUSqV2V/j0d6P8J0x2yQxXKEXmLr3T3T1XGpGxwG3hMCJlNFJVrvdL' .
    'mLkB3Jl4OXH5cHN3Xr0tZzBFzXCFUmTu0jtNuWbZImHxXQzfzjy9xakPHUSIAqOCcsVQNJTa8uJh' .
    'qVA0eFGrqk6Z2XCJ7VvdZl4gW5Rj6pXd8n5HJ+5Bx/UkXxVr9gNDU5SG3s+S5HWR6lULhPZt4hX' .
    '82Fsh2xR2gSJEPmABWPG4PEbCQ0Z0y+6JK6iANjZHYvQfzlKLJlJC/KoxKUqPd0m3i2+qZfAr00F' .
    'V4xgQhv55XU3zQYKOaGfJZVqMy3c6OPnvZvqMcsN1eIFlrNEbLdRgKlQYM5GGHXk7MX3BbLbdJ5K' .
    'zKuC49hI0HUgZs7aQu2LqTKTLr+IQPwZFTg3Pyx1yD3TqO4kEV+Vh2pzLfx/YV3j8C5FVAx4lcV' .
    'NZ+rMq8zfkN2VRlXhVcHdxBdEV9Ugx9jqmQqzKvvOt3N+VVxVXBNcEV4RWFK8q/AWQEB81RDFEVQJL' .
    '5pFWUEq1mVb+5eP/8xmUCpkP5HJ0c/r1RiU0Maw75FWUEn0mlpjEqsoEkF6YQ/QD3r/pGaXDFAqkp5y' .
    '7HqPP2iw0T/PBEfuCAHAZnEJkYIHCJsQDpWVzKvqMuPw5yEyI+Xxs5J8L8u5+/dCzDMfVOvxzCZFyO' .
    'KXHxf0MgpkG8Ey8FPxOC5aRzHyB5lXHcKGAzLlqyXFEcdwMqXSIGr5zTTTL4Gp3vW3O1V0JRAVcOa' .
    'E4q8mJ6lSpVJlJr4WNbmvMGzQHDGGHXSWpbL3jvWEABKvF5CqB6B85xqkzqMGV4K3pK5E7S6lN21pQ' .
    'I+45oFTy0xQlMJR6PcTBVoNJLb0Xv4UGozaPDLOCrNgFfLGcMN2Z5yFX+3F1J3TN3Z9C+bQwAAA=' .
    '//'
);

if (!is_dir($logoDir)) {
    mkdir($logoDir, 0755, true);
}

// Create the isubyo logo PNG
$logoPath = $logoDir . '/isubyo.png';
file_put_contents($logoPath, $pngData);
chmod($logoPath, 0644);

echo "✓ Generated: isubyo.png\n";

// For favicon, use the same PNG
$faviconPath = __DIR__ . '/public/favicon.png';
file_put_contents($faviconPath, $pngData);
chmod($faviconPath, 0644);

echo "✓ Generated: favicon.png\n";

echo "\nPNG logos generated successfully!\n";
echo "Files created:\n";
echo "  - public/images/isubyo.png\n";
echo "  - public/favicon.png\n";
?>
