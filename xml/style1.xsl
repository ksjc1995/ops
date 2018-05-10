<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body> 
  <xsl:apply-templates/>  
  </body>
  </html>
</xsl:template>

<xsl:template match="successmsg">
  <p>
    <xsl:apply-templates select="title"/>
      <a href="../index.php"><xsl:apply-templates select="subtitle"/></a>
  </p>
</xsl:template>

<xsl:template match="title">
  <span style="
  	text-align:center;
  	letter-spacing: 1.5px;
	display: block;
	color:#7CB342;
	font-size: 2.0em;">
  <xsl:value-of select="."/></span>
  <br />
</xsl:template>

<xsl:template match="subtitle">
	<span style="
	text-align:center;	
	font-size: 1.4em;
	color:#009688;
	display:block;">
  <xsl:value-of select="."/></span>
  <br />
</xsl:template>

</xsl:stylesheet>



