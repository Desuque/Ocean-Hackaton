precision mediump float;

uniform vec3 uAmbientLightColor;
uniform vec3 uDirectionalLightColor;
uniform vec3 uLightDirection;

varying vec2 texCoord;
varying vec3 normal;

uniform sampler2D uSampler;
uniform sampler2D uNightSampler;
uniform sampler2D uPatchSampler;


void main(void) {
  float directionalLightAmount = max(dot(normal, uLightDirection), 0.0);
  vec3 lightColor = uAmbientLightColor + (uDirectionalLightColor * directionalLightAmount);
  
  vec3 litTexColor = texture2D(uSampler, texCoord).rgb * lightColor * 2.0;
  
  vec3 nightLightColor = texture2D(uNightSampler, texCoord).rgb * pow(1.0 - directionalLightAmount, 2.0) ;

  vec3 patchColor = texture2D(uPatchSampler, texCoord).rgb;

  gl_FragColor = vec4(litTexColor + nightLightColor + patchColor, 1.0);
}