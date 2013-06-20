<?xml version="1.0" encoding="UTF-8"?>
<!--Richard Favors, November 12, 2012, Assignment 6 ICT 4540-->
  <xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="xhtml"/>
  <xsl:template match="/">
      <h1>Table of 18th Century US Presidents</h1>
      <h3>Count: <xsl:value-of select="count(presidents/president[starts-with(took_office,'17') or starts-with(left_office,'17')])"/></h3>
      <table border="1">
        <tr align="center" class="header">
          <td>Name</td>
          <td>Birthday</td>
          <td>Took Office</td>
          <td>Left Office</td>
          <td>Party</td>
        </tr>
        <xsl:apply-templates select="presidents/president"/>
      </table>
  </xsl:template>

  <xsl:template match="president">
  <xsl:if test="(starts-with(left_office,'17') or starts-with(took_office,'17'))">
    <tr><xsl:attribute name="class"><xsl:value-of select="party"/></xsl:attribute>
      <td><xsl:apply-templates select="name"/></td>
      <td><xsl:apply-templates select="birthday"/></td>
      <td><xsl:apply-templates select="took_office"/></td>
      <td><xsl:apply-templates select="left_office"/></td>
      <td><xsl:apply-templates select="party"/></td>
     </tr>
  </xsl:if>
  </xsl:template>

  <xsl:template match="name">
  <xsl:value-of select="."/>
  </xsl:template>
  <xsl:template match="birthday">
  <xsl:value-of select="."/>
  </xsl:template>
  <xsl:template match="took_office">
  <xsl:value-of select="."/>
  </xsl:template>
  <xsl:template match="left_office">
  <xsl:value-of select="."/>
  </xsl:template>
  <xsl:template match="party">
  <xsl:value-of select="."/>
  </xsl:template>
  
  </xsl:stylesheet>