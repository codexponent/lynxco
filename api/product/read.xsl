<?xml version='1.0'?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
  <html>
  <body>
    <table border="2" bgcolor="yellow">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
      </tr>
      <xsl:for-each select="products/product">
      <tr>
        <td><xsl:value-of select="name"/></td>
        <td><xsl:value-of select="description"/></td>
        <td><xsl:value-of select="price"/></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>