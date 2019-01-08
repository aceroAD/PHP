<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">    
        <ul>          
          <xsl:for-each select="categorias/categoria">
            <li>
            <xsl:variable name="url"><xsl:value-of select="codCat"/></xsl:variable>
            <a href = "tabla_productos.php?codCat={$url}">
              <xsl:value-of select="nombre"/>
              </a>
            </li>
          </xsl:for-each>
        </ul>
  </xsl:template>
</xsl:stylesheet>

