USE [um_db]
GO

/****** Object:  Table [dbo].[transaksi_video_upload]    Script Date: 7/7/2025 11:26:14 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[transaksi_video_upload](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tanggal] [datetime] NULL,
	[kode] [varchar](50) NULL,
	[divisi] [varchar](50) NULL,
	[kategory] [varchar](100) NULL,
	[judul] [varchar](300) NULL,
	[tujuan] [varchar](300) NULL,
	[link] [varchar](300) NULL,
	[ket] [varchar](300) NULL,
	[dateEntry] [datetime] NULL,
	[username] [varchar](50) NULL,
 CONSTRAINT [PK_transaksi_video_upload] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE transaksi_video_upload
ADD 
    nama_document VARCHAR(2000) NULL,
    ukuran_file FLOAT NULL,
    size_type CHAR(20) NOT NULL DEFAULT 'MB',
    type_file VARCHAR(100) NOT NULL DEFAULT 'unknown';

ALTER  TABLE transaksi_video_upload
ADD  CONSTRAINT ukuran_file  DEFAULT 0 FOR  ukuran_file;